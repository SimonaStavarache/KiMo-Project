
$(document).on("click", function(e){
    if($(e.target).is("#toggleAccsettings")){
        $("#accsettings").show();
    }
    else
    if($(e.target).is("#toggleOverview") || $(e.target).is("#toggleKids") || $(e.target).is("#toggleGroups") || $(e.target).is("#toggleNotifications"))
        {
             $("#accsettings").hide();
        }
});

$(document).on("click", function(e){
    if($(e.target).is("#toggleKids")){
        $("#kids").show();
    }
    else
    if($(e.target).is("#toggleOverview") || $(e.target).is("#toggleAccsettings") || $(e.target).is("#toggleGroups") || $(e.target).is("#toggleNotifications"))
    {
        $("#kids").hide();
    }
});

$(document).on("click", function(e){
    if($(e.target).is("#toggleGroups")){
        $("#groups").show();
    }
    else
    if($(e.target).is("#toggleOverview") || $(e.target).is("#toggleKids") || $(e.target).is("#toggleAccsettings") || $(e.target).is("#toggleNotifications"))
    {
        $("#groups").hide();
    }
});

$(document).on("click", function(e){
    if($(e.target).is("#toggleNotifications")){
        $("#notifications").show();
    }
    else
    if($(e.target).is("#toggleOverview") || $(e.target).is("#toggleKids") || $(e.target).is("#toggleGroups") || $(e.target).is("#toggleAccsettings"))
    {
        $("#notifications").hide();
    }
});