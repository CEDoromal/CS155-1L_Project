
let id = $("input[name*='id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let name = $("input[name*='name']");
    let type = $("input[name*='type']");
    let dsc = $("input[name*='dsc']");
    let price = $("input[name*='price']");
    let quantity = $("input[name*='quantity']");
    let img = $("input[name*='img']");

    id.val(textvalues[0]);
    name.val(textvalues[1]);
    type.val(textvalues[2]);
    dsc.val(textvalues[3]);
    price.val(textvalues[4].replace("$", ""));
    quantity.val(textvalues[5]);
    img.val(textvalues[6]);
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}
