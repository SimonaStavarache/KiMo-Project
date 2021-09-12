var choices = ["one", "two"];




function addInput(divName) {
    var newDiv = document.createElement('div');
    var selectHTML = "";
    selectHTML="<a class='btn icon-btn btn-success' href='#'>" +
        "<input type='button' value='Add Kid' class='glyphicon btn-glyphicon glyphicon-plus img-circle text-success' " +
        "onclick='addInput('dynamicInput')'></a>";

    newDiv.innerHTML = selectHTML;
    document.getElementById(divName).appendChild(newDiv);
}