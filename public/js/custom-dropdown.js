
$(document).ready(function () {

    const counters = [3, 3, 3, 3, 3, 3];
    let selectedStyle = 0;
    
    function updateCounters() {
      $('.counter').each(function () {
        const index = $(this).data('index');
        if (index === undefined) return;
    
        const $countEl = $(this).find('.count');
        const $inputEl = $(this).find('input');
    
        if ($countEl.length) $countEl.text(counters[index]);
        if ($inputEl.length) $inputEl.val(counters[index]);
      });
    
      // Update selected header preview
      const $selectedCounter = $('#selected-counter');

      $selectedCounter.html(getCounterHTML(selectedStyle));
      bindCounterEvents(); // Re-bind events for newly added buttons
    }
    
    function toggleDropdown() {
      const $content = $('#dropdownContent');
      const $arrow = $('#dropdownArrow');
      const isOpen = $content.css('display') === 'flex';
      $content.css('display', isOpen ? 'none' : 'flex');
      $arrow.toggleClass('open', !isOpen);
    }
    
    function selectStyle(index) {
      selectedStyle = index;
    
      // Update label
      $('#selected-label').text(`Style ${index + 1}`);
    
      // Highlight selected row
      $('.dropdown-content .row').each(function (i) {
        $(this).toggleClass('selected', i === index);
      });
    
      toggleDropdown();
      updateCounters();
    }
    
    function getCounterHTML(index) {
      const value = counters[index];
      switch (index) {
        case 0:
          return `
            <div class="counter form-group style1 ">
              <button class="btn plus">+</button>
              <span class="count selected-label">${value}</span>
              <button class="btn minus">−</button>
            </div>`;
        case 1:
          return `
            <div class="counter  form-group style2">
              <button class="btn plus">+</button>
              <span class="count selected-label">${value}</span>
              <button class="btn minus">−</button>
            </div>`;
        case 2:
          return `
            <div class="counter form-group style3">
              <div class="custom-input">
                <span class="value selected-label">${value}</span>
                <div class="arrows">
                  <button class="arrow up plus">▲</button>
                  <button class="arrow down minus">▼</button>
                </div>
              </div>
            </div>`;
        case 3:
          return `
            <div class="counter form-group style4">
              <button class="btn left plus">◀</button>
              <span class="count selected-label">${value}</span>
              <button class="btn right minus">▶</button>
            </div>`;
        case 4:
          return `
            <div class="counter form-group style5">
              <span class="btn plus">+</span>
              <span class="count selected-label">${value}</span>
              <button class="btn minus">−</button>
            </div>`;
        case 5:
          return `
            <div class="counter form-group style6">
              <button class="btn plus">+</button>
              <span class="count">${value}</span>
              <button class="btn minus">−</button>
            </div>`;
        default:
          return '';
      }
    }
    
    function bindCounterEvents() {
      $('.counter').each(function () {
        const index = $(this).data('index');
        if (index === undefined) return;
    
        $(this).find('.plus').off('click').on('click', function (e) {
          e.stopPropagation();
          counters[index]++;
          updateCounters();
        });
    
        $(this).find('.minus').off('click').on('click', function (e) {
          e.stopPropagation();
          if (counters[index] > 0) counters[index]--;
          updateCounters();
        });
    
        const $upBtn = $(this).find('.arrow.up');
        const $downBtn = $(this).find('.arrow.down');
    
        $upBtn.off('click').on('click', function (e) {
          e.stopPropagation();
          counters[index]++;
          updateCounters();
        });
    
        $downBtn.off('click').on('click', function (e) {
          e.stopPropagation();
          if (counters[index] > 0) counters[index]--;
          updateCounters();
        });
      });
    }
    
    // Initial render
    updateCounters();
    
});