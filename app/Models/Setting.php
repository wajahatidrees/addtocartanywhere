<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'enable_app',
        'show_hide_button',
        'show_widget_home',
        'show_widget_collection',
        'show_widget_result',
        
        'select_icon_postion',
        'custom_text',
        'select_button_style',
        'diff_buttonstyle', 
        'cart_button_style',
        'custom_puls_minus_color',
        'custom_quantity_color',
        'custom_button_color',
        'custom_text_color',
        'show_hide_varsize_color',

        'enable_animation_btn',
        'show_button_hover',
        'show_button_directly',
        'show_hide_un_var',
        'append_to_button_style',
        'quantity_button_style',
       

        'show_hide_sold_out_button',
        'soldOutButtonSize',
        'soldOutSelectorButtonColor',
        'soldOutSelectorBorderRadius',
        'soldOutSelectorBackgroundColor',
        'soldOutSelectorFontSize',
        'soldOutSelectorFontColor',
        'soldOutSelectorFontStyle',
        'redirect_policy',
        'var_price_range',

        
        'variantSelectorBorderSize',
        'variantSelectorBorderColor',
        'variantSelectorBorderRadius',
        'variantSelectorBackgroundColor',
        'variantSelectorFontSize',
        'variantSelectorFontColor',
        'variantSelectorFontStyle',
        'variantSelectorFontFamily',
        'variantSelectorLabelFontSize',
        'variantSelectorLabelFontColor',

        'ess_email_sent'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
