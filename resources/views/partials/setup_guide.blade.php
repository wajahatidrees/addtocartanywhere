<article>
    <div id="setup-guide-popup" class="setupGuide_popup table-card card">
        <div class="setupGuide_popup-header">
            <h2 class="eosh-h2 dropdownHeader">Setup guide</h2>
            <p class="para_size">Use this personalized guide to get your store up and running.</p>
            <span style="cursor: text;" class="button eosh-default-btn">{{ $themeNew ? ($trueCount . ' / 4 completed') : (($trueCount - 1) . ' / 3 completed') }}</span>

            <div class="setupGuide_dropdown_btn">
                <button class="setupGuide_chevron_down"><img src="{{ asset('assets/images/down.png') }}" alt="down" loading="lazy">
                </button>
            </div>
        </div>

        <div class="setupGuide_guide">
            <div class="setupGuide_task" id="task1">
                <div class="setupGuide_task-header">
                    <label class="setupGuide_custom-checkbox">
                        <input type="checkbox" class="setupGuide_checkbox-input" {{ $progress['app_language'] ? 'checked' : '' }} disabled>
                        <span class="setupGuide_checkbox-circle"></span>
                    </label>
                    <label class="setupGuide_tab_heading" for="checkbox1"> Choose language</label>
                </div>
                <div class="setupGuide_task-content">
                    <div class="setupGuide_content">
                        <p class="para_size">
                            Select your preferred language for a personalized app experience!
                        </p>
                    </div>
                    <div class="setupGuide_image align-right">
                        <img src="{{ asset('setupGuide/1.webp') }}" width="70%" loading="lazy">
                    </div>
                </div>
            </div>

            <div class="setupGuide_task" id="task2">
                <div class="setupGuide_task-header">
                    <label class="setupGuide_custom-checkbox">
                        <input type="checkbox" class="setupGuide_checkbox-input" {{ $progress['app_setting'] ? 'checked' : '' }} disabled>
                        <span class="setupGuide_checkbox-circle"></span>
                    </label>
                    <label class="setupGuide_tab_heading" for="checkbox2">General Settings</label>
                </div>
                <div class="setupGuide_task-content">
                    <div class="content">
                        <p class="para_size">
                            Customize app's general settings here.
                        </p>
                        <button class="button eosh-brand-btn action-btn primary" onclick="handleNavigation('/general_setting')">App Configuration</button>
                    </div>
                    <div class="setupGuide_image align-right">
                        <img src="{{ asset('setupGuide/2.webp') }}" width="70%" loading="lazy">
                    </div>
                </div>
            </div>

       

            @if($themeNew)
                <div class="setupGuide_task" id="task4">
                    <div class="setupGuide_task-header">
                        <label class="setupGuide_custom-checkbox">
                            <input type="checkbox" class="setupGuide_checkbox-input" {{ $progress['app_embed'] ? 'checked' : '' }} disabled>
                            <span class="setupGuide_checkbox-circle"></span>
                        </label>
                        <label class="setupGuide_tab_heading" for="checkbox5">Activate App</label>
                    </div>
                    <div class="setupGuide_task-content">
                        <div class="content">
                            <p class="para_size">Click and activate the app</p>
                            <a href="https://admin.shopify.com/store/{{ $storeName }}/themes/{{ $currentThemeId }}/editor?context=apps"
                               target="_blank" class="button eosh-brand-btn action-btn primary">
                                Activate App
                            </a>
                        </div>
                        <div class="setupGuide_image align-right">
                            <img src="{{ asset('setupGuide/6.webp') }}" width="70%" loading="lazy">
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</article>


<script>
    const dropdown_btn = document.querySelector('.setupGuide_chevron_down');
    const popupHeader = document.querySelector('.dropdownHeader');
    const popup = document.querySelector('.setupGuide_popup');
    const guide = document.querySelector('.setupGuide_guide');

    const togglePopup = () => {
        popup.classList.toggle('setupGuide_active');
    };
    dropdown_btn.addEventListener('click', togglePopup);
    popupHeader.addEventListener('click', togglePopup);

    // Select all task headers
    const taskHeaders = document.querySelectorAll('.setupGuide_task-header');

    taskHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const task = header.parentElement;
            const taskContent = task.querySelector('.setupGuide_task-content');

            // First, close all other task contents
            taskHeaders.forEach(otherHeader => {
                const otherTask = otherHeader.parentElement;
                const otherTaskContent = otherTask.querySelector('.setupGuide_task-content');

                // Close all tasks except the current one
                if (otherTask !== task) {
                    otherTaskContent.style.display = 'none';
                    otherTask.classList.remove('open');
                }
            });

            // Toggle current task content display
            taskContent.style.display = taskContent.style.display === 'flex' ? 'none' : 'flex';

            // Toggle 'open' class to rotate dropdown arrow
            task.classList.toggle('open');
        });
    });
</script>
