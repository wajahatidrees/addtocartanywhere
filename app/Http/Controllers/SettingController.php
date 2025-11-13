<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\FeatureRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\User;



class SettingController extends Controller
{

    public function billingPlan()
    {  
        $shop = Auth::user();
        $plan = "";

                // 1️⃣ Fetch shop info from Shopify
        // $shopApi = $shop->api()->rest('GET', '/admin/api/2025-01/shop.json');
        // $shopInfo = $shopApi['body']['shop'];
        // $devPlans = ['affiliate', 'partner_test', 'plus_sandbox', 'development']; 
        // if (in_array($shopInfo['plan_name'], $devPlans)) {
        //     $shop->shopify_freemium = 1;
        //     $shop->plan_id = null;
        //     $shop->save();
        //     return redirect()->route('dashboard', ['shop' => Auth::user()->name,'host'=>app('request')->input('host')]);
        // }

        $shopApi = $shop->api()->rest('GET', '/admin/api/2025-01/shop.json');
        $shopInfo = $shopApi['body']['shop'];
        $plan = $shopInfo['plan_name'];
        
        if (( $plan == "development" || $plan == "trial" ||$plan == "plus trial" ||$plan == "developer preview" ||$plan == "partner_test" ||$plan == "affiliate")){
            if ($shop->shopify_freemium != '1') {
                DB::table('users')->where('id', $shop->id)->update(['shopify_freemium' => 1]);
                auth()->user()->refresh();
            }
            return redirect()->route('dashboard', ['shop' => Auth::user()->name,'host'=>app('request')->input('host')]);
        }


        // if (isset($shop['plan_id']) && !empty($shop['plan_id'])) {
        //     return redirect()->route('show-setting', ['shop' => Auth::user()->name,'host'=>app('request')->input('host')]);
        // }
        if (isset($shop['plan_id']) && !empty($shop['plan_id'])) {
            return redirect()->route('dashboard', ['shop' => Auth::user()->name,'host'=>app('request')->input('host')]);
        }
        else{
            return redirect()->route('billing.index', ['shop' => Auth::user()->name,'host'=>app('request')->input('host')]);
        }
    }

    public function videoGuide()
    {
        return view('video.videoguide');
    }


    public function getView(Request $request)
    {
        $shop = Auth::user();
        $tourData = null;
        if (str_contains(request()->headers->get('referer'), '/authenticate')) {
            $tourData = $this->checkAndCompleteTourStep($request);
        }
        $progressBar = $this->userTourProgress->checkTourProgressBar($shop);
        
        // return $progressBar; 

        $themeNew = false;
        $currentThemeId = '';
        $storeName = '';
        $scope='';
                
        $scopes = $shop->api()->rest('GET', '/admin/oauth/access_scopes.json');
        $scope = $scopes['body']['access_scopes'];
                    /*NEW CODE*/
        $storeNameFull = $shop->name;
        $storeName = str_replace(".myshopify.com", "", $storeNameFull);

        $themesInfo = $shop->api()->graph('query {
            themes(first: 1, roles: MAIN) {
              edges {
                node {
                  id
                }
              }
            }
        }');

        if($themesInfo['errors']!= true){
        $currentThemeId=$themesInfo['body']['data']['themes']['edges'][0]->node->id;
        $query='query GetThemeAsset($currentThemeId: ID!) {
            theme(id: $currentThemeId) {
            id
            name
            themeStoreId
            files(first: 250, filenames: ["templates/product.json", "templates/collection.json", "templates/cart.json"]) {
                edges {
                node {
                    filename
                }
                }
            }
            }
        }';

         $assestFiles = $shop->api()->graph($query, $variables = ['currentThemeId'=> $currentThemeId]);  
         if (!$assestFiles['errors']) {
             $edges=$assestFiles['body']['data']->theme->files->edges;
             $nodeCount = count($edges);
             if($nodeCount == 3){
                 $themeNew = true;
             }
         }
         $currentThemeId=basename(parse_url($currentThemeId, PHP_URL_PATH));
        }

        return response()->view('partials.tourProgressBar',compact('tourData','progressBar','currentThemeId','storeName','themeNew','scope'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $shop = Auth::user();
        // $userId = Auth::user()->id;
        // $settingdata =Setting::where('user_id',$userId)->first();

        $user = Auth::user();
        $settingdata = $user->setting;

        $res = auth()->user()->api()->graph('{
            currentAppInstallation {
                id
              }
        }');

        $appInstallationID = $res['body']['data']['currentAppInstallation']['id'];
        $metaFields = $this->getMetaFields($appInstallationID);
        $selectedCollections = [];
        foreach ($metaFields as $field) {
            $query = 'query CollectionByHandle($handle: String!) {
                collectionByHandle(handle: $handle) {
                    id
                    title
                    handle
                }
            }';
    
            $variables = [
                "handle" => $field['node']['value']
            ];
    
            $res = auth()->user()->api()->graph($query, $variables);
            $handle = $res['body']['data']['collectionByHandle']['handle'];
            $title = $res['body']['data']['collectionByHandle']['title'];
            $selectedCollections[$handle] = $title;
        }

                // welcome email
            // $shopifyApi = $shop->api()->graph('query {
            //         shop {
            //             currencyCode
            //             name
            //             email
            //             plan{
            //             displayName
            //             }
            //             currencyFormats{
            //             moneyFormat
            //             }
            //         }
            // }');
                
            // $name =$shopifyApi['body']['data']['shop']['name'];
            // $email = $shopifyApi['body']['data']['shop']['email'];
        // $shopifyApi = $shop->api()->rest('GET', '/admin/shop.json');
        // $name = $shopifyApi['body']['shop']['name'];
        // $email = $shopifyApi['body']['shop']['email'];
        
        // if ((isset($shop->plan) || $shop->isFreemium() || $shop->isGrandfathered()) && !$shop->email_sent) {
        //     dispatch(new SendWelcomeEmail([
        //         'name' => $name, 'email' => $email
        //     ]));
        //     $shop->update(['email_sent' => true]);
            // $shop->setAttribute('created_at', $shop->created_at ?: now());
            // $shop->save();
        // }

        return view('setting', compact('settingdata', 'selectedCollections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
   
    //     $validator = Validator::make($request->all(),[
    //         // 'append_to_button_style' => 'required',
    //         // 'select_button_style' => 'required',
    //         // 'custom_text' => 'required',
    //     ]);
        
    //     if($validator->fails()) {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     try{ 
    //         $userId = Auth::user()->id;
    //         // $checksetting =Setting::where('user_id',$userId)->first();
            
    //         $user = Auth::user();
    //         $checksetting = $user->setting;

    //         // meta start 
    //          $featuredCollections = $request->featured_collections ?? [];
    //          $res = auth()->user()->api()->graph('{
    //              currentAppInstallation {
    //                  id
    //              }
    //          }');
    //          $appInstallationID = $res['body']['data']['currentAppInstallation']['id'];
    //          $metaFields = $this->getMetaFields($appInstallationID);
    //          $deleteMetaFields = '';
    //          $setMetaFields = '';
    //          if (!isset($metaFields['errors']))
    //          $deleteMetaFields = $this->deleteMetaFields($metaFields);
    //          if (!isset($metaFields['errors']) && !isset($deleteMetaFields['errors']))
    //          $setMetaFields = $this->setMetaFields($featuredCollections, $appInstallationID);
    //         // meta end

    //         if($checksetting){
    //             $update = $this->update($request);

    //             return  response()->json(array_merge($update, [
    //                 'get_meta_response' => isset($metaFields['errors']) ? $metaFields['errors'] : true,
    //                 'delete_meta_response' => $deleteMetaFields,
    //                 'set_meta_response' => $setMetaFields
    //             ]));

    //         }else{
    //             $input = $request->except(['_token']);
    //             $input['user_id']=$userId;
    //             $setting = Setting::create($input);
    //             // return $setting;
    //             return response()->json([
    //                 'status'=>200,
    //                 'message' => 'Data submitted sucessfully',
    //                 'get_meta_response' => isset($metaFields['errors']) ? $metaFields['errors'] : true,
    //                 'delete_meta_response' => $deleteMetaFields,
    //                 'set_meta_response' => $setMetaFields
    //             ]);
    //         }
    //     }catch(Exception $e){
    //         return response()->json([
    //             'status'=>400,
    //             'errormessage' => $e->getMessage(),
    //             'get_meta_response' => isset($metaFields['errors']) ? $metaFields['errors'] : true,
    //             'delete_meta_response' => $deleteMetaFields,
    //             'set_meta_response' => $setMetaFields
    //         ]);
    //     }
    // }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            // Uncomment and adjust if needed
            // 'append_to_button_style' => 'required',
            // 'select_button_style' => 'required',
            // 'custom_text' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }

        $deleteMetaFields = '';
        $setMetaFields = '';
        $metaFields = [];

        try {
            $userId = Auth::id();

            $featuredCollections = $request->featured_collections ?? [];

            if($request->filled('featured_collections') ){
                $res = auth()->user()->api()->graph('{
                    currentAppInstallation {
                        id
                    }
                }');

                $appInstallationID = $res['body']['data']['currentAppInstallation']['id'];
                $metaFields = $this->getMetaFields($appInstallationID);

                if (!isset($metaFields['errors'])) {
                    $deleteMetaFields = $this->deleteMetaFields($metaFields);
                }
                if (!isset($metaFields['errors']) && !isset($deleteMetaFields['errors'])) {
                    $setMetaFields = $this->setMetaFields($featuredCollections, $appInstallationID);
                }
            }
                // Update or Create Settings using updateOrCreate 
                $input = $request->except(['_token']);
                $input['user_id'] = $userId;
                $setting = Setting::updateOrCreate(
                    ['user_id' => $userId], 
                    $input                   
                );

            return response()->json([
                'status' => 200,
                'message' => $setting->wasRecentlyCreated ? 'Settings saved successfully' : 'Settings updated successfully',
                'get_meta_response' => $metaFields['errors'] ?? true,
                'delete_meta_response' => $deleteMetaFields,
                'set_meta_response' => $setMetaFields
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => 400,
                'errormessage' => $e->getMessage(),
                'get_meta_response' => $metaFields['errors'] ?? true,
                'delete_meta_response' => $deleteMetaFields,
                'set_meta_response' => $setMetaFields
            ]);
        }
    }


    // public function saveButtonSettings(Request $request)
    // {

    //     $setting = Setting::updateOrCreate(
    //         ['user_id' => auth()->id()],
    //         [
    //             'custom_text' => $request->input('custom_text', 'Add to Cart'),
    //             'icon' => $request->input('icon'), // e.g. "shopping-cart"
    //             'text_color' => $request->input('text_color'),
    //             'background_color' => $request->input('background_color'),
    //             'button_shape' => $request->input('button_shape'),
    //         ]
    //     );
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Settings saved successfully',
    //         'data' => $setting
    //     ]);
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        try{
            $userId = Auth::user()->id;
            $setting =Setting::where('user_id',$userId)->first();
            if ($setting){
                $input = $request->except(['_token']);
                $setting->update($input);
            }
            return [
                'status'=>200,
                'message' => 'setting updated sucessfully',
            ];
        }catch(Exception $e){
            return [
                'status'=>400,
                'errormessage' => $e->getMessage(),
            ];
        }
    }

    public function getCollections(Request $request)
    {
      $shop = Auth::user();
      $domain = $shop->getDomain()->toNative();

      if(isset($request->search)) {
        $collections = $shop->api()->graph('
          {
            collections(first:250, query:"title:*'.$request->search.'*") {
              edges {
                node {
                  id
                  title
                  handle
                }
              }
            }
          }
        ')['body']['data']['collections']['edges'];
      } else {
        $collections = $shop->api()->graph('
          {
            collections(first:250) {
              edges {
                node {
                  id
                  title
                  handle
                }
              }
            }
          }
        ')['body']['data']['collections']['edges'];
      }


        $data = [];

        foreach ($collections as $collection) {
            array_push($data, array("id" => basename(parse_url($collection['node']['handle'], PHP_URL_PATH)), "text" => $collection['node']['title']));
        }
        return json_encode($data);
    }

    private function getMetaFields($appInstallationID) {
        $query = '
            query AppInstallationMetafields($ownerId: ID!) {
                appInstallation(id: $ownerId) {
                metafields(first: 100) {
                    edges {
                        node {
                            id
                            value
                        }
                    }
                }
                }
            }';
    
    
        $variables = [
            "ownerId" => $appInstallationID,
        ];
        
        $res = auth()->user()->api()->graph($query, $variables);

        if ($res['errors']) {
            return ['errors' => $res['errors']];
        }
        return $res['body']['data']['appInstallation']['metafields']['edges'] ?? [];
    }

    private function setMetaFields($collections, $appInstallationID) {
        foreach ($collections as $key => $value) {
            $query = 'mutation CreateAppDataMetafield($metafieldsSetInput: [MetafieldsSetInput!]!) {
                metafieldsSet(metafields: $metafieldsSetInput) {
                  metafields {
                    id
                    namespace
                    key
                  }
                  userErrors {
                    field
                    message
                  }
                }
              }';

            $res = auth()->user()->api()->graph($query, $variables = [
                "metafieldsSetInput" => 
                    [
                        [
                            "namespace" => "featured_collections",
                            "key" => 'featured_' . $key,
                            "type" => "single_line_text_field",
                            "value" => $value,
                            "ownerId" => $appInstallationID
                        ]
                    ]
            ]);

            if ($res['errors']) {
                return ['errors' => $res['errors']];
            }
        }

        return true;
    }

    private function deleteMetaFields($metaFields) {
        foreach ($metaFields as $metaField) {
            if (!isset($metaField['node'])) continue;

            $query = 'mutation {
                metafieldDelete(input: {
                    id: "'. $metaField['node']['id'] .'"
                }) {
                    deletedId
                    userErrors {
                        field
                        message
                    }
                }
            }';
            
            $res = auth()->user()->api()->graph($query);
            if ($res['errors']) {
                return ['errors' => $res['errors']];
            }
        }

        return true;
    }

    public function nextOrPrevTourStep(Request $request)
    {
        $user = Auth::user();
        $currentPage = $request->input('page');
        $direction = $request->input('direction');

        if ($currentPage === 'all') {
            $user->setTourProgressPage('all');
            return response()->json(['modalContent' => '']);
        }

        $nextOrPrevPage = $this->getNextOrPrevPage($currentPage, $direction);

        if ($direction === 'next' && $nextOrPrevPage !== 'congratulations') {
            $user->setTourProgressPage($nextOrPrevPage);
        }

        $modalContent = view("partials.{$nextOrPrevPage}")->render();

        return response()->json(['modalContent' => $modalContent]);
    }

    private function getNextOrPrevPage($currentPage, $direction)
    {
        $pages = ['app_language', 'app_setting', 'app_embed'];
        $currentIndex = array_search($currentPage, $pages);
        if ($direction === 'next') {
            $nextIndex = $currentIndex + 1;
        } else {
            $nextIndex = $currentIndex - 1;
        }

        if ($nextIndex >= 3) { //count($pages)
            return 'congratulations';
        }

        return $pages[$nextIndex];
    }

    public function dashboard(Request $request)
    {

        $webhooksQuery = '#graphql
            query {
            webhookSubscriptions(first: 10) {
                edges {
                node {
                    id
                    topic
                    endpoint {
                    __typename
                    ... on WebhookHttpEndpoint {
                        callbackUrl
                    }
                    ... on WebhookEventBridgeEndpoint {
                        arn
                    }
                    ... on WebhookPubSubEndpoint {
                        pubSubProject
                        pubSubTopic
                    }
                    }
                }
                }
            }
        }';
        $response = auth()->user()->api()->graph($webhooksQuery);
        $webhooks = $response['body']['data']['webhookSubscriptions']['edges'] ?? [];
    
        if (sizeof($webhooks) > 0) {
            $themePublishWebhook = false;
            foreach ($webhooks as $webhook) {
                if ($webhook['node']['topic'] == 'THEMES_PUBLISH')
                    $themePublishWebhook = true;
            }
        
            if (!$themePublishWebhook) {
                $registerMutation = 'mutation webhookSubscriptionCreate($topic: WebhookSubscriptionTopic!, $webhookSubscription: WebhookSubscriptionInput!) {
                    webhookSubscriptionCreate(topic: $topic, webhookSubscription: $webhookSubscription) {
                        userErrors {
                        field
                        message
                        }
                        webhookSubscription {
                        id
                        topic
                        endpoint {
                            __typename
                            ... on WebhookHttpEndpoint {
                            callbackUrl
                            }
                        }
                        }
                    }
                    }
                ';
                $variables = [
                    'topic' => 'THEMES_PUBLISH',
                    'webhookSubscription' => [
                        'callbackUrl' => 'your_app_url/webhook/themes-publish',
                        'format' => 'JSON'
                    ]
                ];
                auth()->user()->api()->graph($registerMutation, $variables);
            }
        }

        $shop = Auth::user();
        try {
            $shopObject = $shop->api()->rest('GET', '/admin/shop.json');
            $result = $shopObject['body']['shop'];
            // $name = $result['name'];
            // $email = $result['email'];
            // if ((isset($shop->plan) || $shop->isFreemium() || $shop->isGrandfathered()) && !$shop->email_sent) {
            //     dispatch(new SendWelcomeEmail(['name' => $name, 'email' => $email]));
            //     $shop->update(['email_sent' => true]);
            //     $shop->setAttribute('created_at', $shop->created_at ?: now());
            //     $shop->save();
            // }
            $tourData = null;
            if (str_contains(request()->headers->get('referer'), '/authenticate')) {
                $tourData = $this->checkAndCompleteTourStep($request, $shop);
            }
            return view('dashboard', compact('tourData'));
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function submitFeatureRequest(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'feature' => 'required',
            'details' => 'nullable',
            'file_path.*' => 'nullable|mimes:jpeg,png,pdf,docx|max:2048',
        ],[
            'file_path.*.mimes' => 'The file must be a file of type: jpeg, png, pdf, or docx.',
            'file_path.*.max' => 'Each file may not be greater than 2048 kilobytes.',
        ]);
        DB::beginTransaction();
        try {
            $activeShop = Auth::user();
            $plan = DB::table('plans')->where('id', $activeShop->plan_id)->first();
            if ($plan) {
                $subscriptionType = ($plan->interval === 'EVERY_30_DAYS') ? 'monthly' : 'yearly';
            } else {
                $subscriptionType = null;
            }
            $featureRequest = FeatureRequest::create([
                'email' => $data['email'] ?? null,
                'phone' => $data['phone'] ?? null,
                'feature' => $data['feature'] ?? null,
                'details' => $data['details'] ?? null,
                'store_url' => $activeShop->name ?? null,
                'subscription_type' => $subscriptionType ?? null,
            ]);
            if ($request->hasFile('file_path')) {
                foreach ($request->file('file_path') as $file) {
                    if ($file) {
                        $filePath = $file->store('featureRequests', 'public');
                        DB::table('feature_request_files')->insert([
                            'feature_request_id' => $featureRequest['id'],
                            'file_path' => $filePath,
                        ]);
                    }
                }
            }

            try {
                Mail::send('email.featureRequestSubmitted', ['request' => $featureRequest], function ($message) use ($data) {
                    $message->to($data['email'])
                        ->subject('Thank you for your feature request!');
                });
            } catch (\Exception $e) {
                Log::error("Failed to send confirmation email: ".$e->getMessage());
            }
            try {
                $recipientEmail = 'ess@extendons.com';
                Mail::send('email.featureRequested', ['request' => $featureRequest], function ($message) use ($recipientEmail) {
                    $message->to($recipientEmail)
                        ->subject(getAppName().' New Feature Request');
                });
            } catch (\Exception $e) {
                Log::error("Failed to send admin notification: ".$e->getMessage());
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Request submitted successfully']);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error submitting feature request: ".$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error submitting request, please try again later.'], 500);
        }
    }

    public function getSetupGuideData(Request $request) {
        $activeShop = User::with('Setting')->find(Auth::id());
 
        $progress = $this->userTourProgress->checkSetupGuideProgress($activeShop);
   
      
        $trueCount = count(array_filter($progress, function($value) {
            return $value === true;
        }));
        $themeNew = false;
        $currentThemeId = '';
        $storeName = '';
        $scope = '';
        $dataProduct = [];
        $scopes = $activeShop->api()->rest('GET', '/admin/oauth/access_scopes.json');
        $scope = $scopes['body']['access_scopes'];
        $storeNameFull = $activeShop->name;

        $storeName = str_replace(".myshopify.com", "", $storeNameFull);
        $themesInfo = $activeShop->api()->rest('GET', '/admin/themes.json', ['role' => 'main']);
        if (!$themesInfo['errors']) {
            $currentThemeId = $themesInfo['body']['themes'][0]['id'];
            $themeNew = true;
        }

        $setupGuideHtml = View::make('partials.setup_guide', [
            'progress' => $progress,
            'themeNew' => $themeNew,
            'storeName' => $storeName,
            'currentThemeId' => $currentThemeId,
            'trueCount' => $trueCount,
            'scope' => $scope,
            'storeNameFull' => $storeNameFull,
        ])->render();

        return response()->json([
            'themeNew' => $themeNew,
            'currentThemeId' => $currentThemeId,
            'storeName' => $storeName,
            'setupGuideHtml' => $setupGuideHtml,
        ]);
    }

    public function checkTourStep($activeShop, $page)
    {
        if ($activeShop->tourProgress()->where('page', 'all')->exists()) {
            return false;
        }
        return !$activeShop->getTourProgressPage($page);
    }

    public function checkSetupGuideProgress($activeShop){
        $pageChecks = [
            'app_language' => true,
            'app_setting' => $activeShop->setting !== null,
            'app_embed' => $this->checkAppEmbed($activeShop)
        ];

        return $pageChecks;
    }



    

}
