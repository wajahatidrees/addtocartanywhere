$(document).ready(function () {
    $(".eosh_question").each(function () {
        $(this).click(function () {
            $(this).toggleClass("active");
            
            var tab_content = $(this).next();
            
            if (tab_content.css("max-height") !== "0px") {
                tab_content.css("max-height", "0px");
                $(this).find(".arrow-icon").css("transform", "rotate(0deg)");
            } else {
                tab_content.css("max-height", tab_content[0].scrollHeight + "px");
                $(this).find(".arrow-icon").css("transform", "rotate(180deg)");
            }
        });
    });
});
