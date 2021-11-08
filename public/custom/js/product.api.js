var token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkub2N0b3B1cy51elwvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MzU3NTkxNzEsImV4cCI6MTYzNTc2Mjc3MSwibmJmIjoxNjM1NzU5MTcxLCJqdGkiOiIySkplMUphRkFSRTJPN2lZIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.gfCKI_-_SU1_zNnppCaqBsfzw6YQK1yE5vg507Wx4c8";
var res = null;
const getProductsList = function(e){
    $.ajax({
        url: "https://api.octopus.uz/api/v1/products",
        type: "GET",
        headers: {"Authorization": "Bearer " + token},
        success: function(response) {
            res = response;
            createProduct(res);
        }

    });
}

prevPage = function(result){
    if(res.links.prev != null){
        const prev = regenerateUrl(result.links.prev);
        document.getElementById('output').innerHTML = '';
        $.ajax({
            url: prev,
            type: "GET",
            headers: {"Authorization": "Bearer " + token},
            success: function(response) {
                res = response;
                createProduct(res);
            }
        });
    }
}

nextPage = function(result){
    if(res.links.next != null){
        const next = regenerateUrl(result.links.next);
        document.getElementById('output').innerHTML = '';
        $.ajax({
            url: next,
            type: "GET",
            headers: {"Authorization": "Bearer " + token},
            success: function(response) {
                res = response;
                createProduct(res);
            }

        });
    }
}

createProduct = function(result){
    for(i of result.data){
        if($('#output')[0].children.length < 10){
            $('#output').append(
            `
                <tr>
                    <td>${i.Id}</td>
                    <td>${i.Name}</td>
                    <td>${i.Category.Name}</td>
                    <td>${i.Measurement.Name}</td>
                    <td>${i.Price}</td>
                    <td class="productEditBtn">
                        <a  href="#">Изменить</a>
                    </td>
                    <td class="productDelBtn">
                        <a href="#" style="color:red">Удалить</a>
                    </td>
                </tr>
            `
        );}
    }
}

$('#next').on('click', function(e){
    nextPage(res);
});
$('#prev').on('click', function(e){
    prevPage(res);
});
$('#prodCreateBtn').on('click', function(e){
    addProduct();
});
