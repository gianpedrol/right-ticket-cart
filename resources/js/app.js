require("./bootstrap");
require("./jquery");

$(document).ready(function () {
    var frm = $("cartform");

    console.log(frm);

    $(function () {
        $('form[name="addTocart"]').on("submit", function (event) {
            var id = $(this).attr("data-id");
            event.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                method: "post",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    id: id,
                }),
                dataType: "json",
                success: function (data) {
                    console.log("Submission was successful.");
                    console.log(data);
                    alert("ok");
                },
                error: function (data) {
                    console.log("An error occurred.");
                    console.log(data);
                },
            });
        });
    });
});

$(document).ready(function () {
    $('form[name="updateTocart"]').on("submit", function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");
        var quantity = $(this).find('input[name="quantity"]').val();
        alert(quantity);
        /*  if (quantity == 0) {
                quantity = 1;
            }
            event.preventDefault();
            var obj = [id, quantity];
            // alert("submit");
            $.ajax({
                url: $(this).attr("action"),
                method: "post",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify({
                    id: id,

                    quantity: quantity,
                }),
                dataType: "json",
                success: function (data) {
                    console.log("Submission was successful.");
                    console.log(data);
                    alert("ok");
                },
                error: function (data) {
                    console.log("An error occurred.");
                    console.log(data);
                },
            });*/
    });
    //procura todos os elementos em que o id começa com preco_ e que está dentro de uma td

});


$("#row").change(function () {
    var valor = $("#price").text();
    var quantidade = $("#qty").val();
    var total = valor * quantidade;
    document.getElementById("subtotal").innerHTML = total.toFixed(2);
    //conteudo da tag td que tem id começando com #preco_
    var valor = $(this).text();
    //encontra a tag tr pai da tag td, depois encontra a tag quantity-col
    //e retorna o valor do input
    var quantidade = $(this).parent().find("#qty").find("input").val();

    if (quantidade != "") {
        quantidades = parseInt(quantidade) + quantidades;
    }
    total = valor * quantidade;
});
console.log(total);
$("#subtotal").html(total);
