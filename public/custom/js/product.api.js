const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkuY2FmZS5sY1wvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2NDY3Mzk4MzMsImV4cCI6MTY0Njc0MzQzMywibmJmIjoxNjQ2NzM5ODMzLCJqdGkiOiJydUFrMlBEUXFuZEZheUN6Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.GMPS7M7AOKEcJqSCdoN-hHV-RheSl3lhJwpqbHay9Oo";
var res = null;
const getProductsList = function(e) {
    $.ajax({
        url: "http://api.cafe.lc/api/v1/products",
        type: "GET",
        headers: { "Authorization": "Bearer " + token },
        success: function(response) {
            res = response;
            createProduct(res);
        }
    });
}

prevPage = function(result) {
    if (res.links.prev != null) {
        const prev = regenerateUrl(result.links.prev);
        document.getElementById('output').innerHTML = '';
        $.ajax({
            url: prev,
            type: "GET",
            headers: { "Authorization": "Bearer " + token },
            success: function(response) {
                res = response;
                createProduct(res);
            }
        });
    }
}

nextPage = function(result) {
    if (res.links.next != null) {
        const next = regenerateUrl(result.links.next);
        console.log(next);
        document.getElementById('output').innerHTML = '';
        $.ajax({
            url: next,
            type: "GET",
            headers: {
                "Authorization": "Bearer " + token,
            },
            success: function(response) {
                res = response;
                createProduct(res);
            }

        });
    }
}

createProduct = function(result) {
    for (i of result.data) {
        if ($('#output')[0].children.length < 10) {
            $('#output').append(
                `
                <tr>
                    <td>${i.Id}</td>
                    <td>${i.Name}</td>
                    <td>${i.Category.Name}</td>
                    <td>${i.Measurement.Name}</td>
                    <td>${i.Price}</td>
                    <td class="productEditBtn">
                        <a  href="javascript:void(0)">Изменить</a>
                    </td>
                    <td id="productDelBtn" class="productDelBtn">
                        <a id="productDelBtn${i.Id}"" href="#" style="color:red">Удалить</a>
                    </td>
                </tr>
            `
            );
        }
    }
}

$('#next').on('click', function(e) {
    nextPage(res);
});
$('#prev').on('click', function(e) {
    prevPage(res);
});
$('#prodCreateBtn').on('click', function(e) {
    addProduct();
});
$("#productStoreBtn").on('click', function(e) {
    storeProduct('productCreateForm', 'http://api.cafe.lc/api/v1/products');
    return false;
});

let storeProduct = function(form, url) {
    console.log($("#" + form).serialize());
    $.ajax({
        url: url,
        type: "POST",
        headers: { "Authorization": "Bearer " + token },
        data: $("#" + form).serialize(),
        success: function(response) { //Данные отправлены успешно
            result = $.JSONparse(response);
            console.log(result);
        },
        error: function(response) { // Данные не отправлены
            console.log('Ошибка. Данные не отправлены.');
        }
    });
}