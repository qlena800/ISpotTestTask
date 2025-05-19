$("#product-form-submit").click(function () {
    const name = $("input[name='name']").val();
    const article = $("input[name='article']").val();
    const token = $("input[name='_token']").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: '/products',
        data: {
            'name': name,
            'article': article,
            "token": token,

        },
        success: function (data) {
            const btn = $("<button type=\"button\" data-id=\"" + data.id + "\" class=\"btn btn-danger product-delete\">Delete </button>");
            btn.click(ProductDelete)
            const tr = $("<tr/>")
            const btnTd = $("<td/>")
            btnTd.append(btn)
            tr.append("<td>" + name + "</td>" )
            tr.append("<td>" + article + "</td>" )
            tr.append(btnTd)

            $('#products-table tbody').append(tr);
            alert('продукт добавлен')
        },
        error: function (jqXHR, text, error) {
            alert('Ошибка сохранения продукта. Заполните оба поля,\nмаксимальная длина поля в символах - 255')
        }
    });
});

$(function () {
    $('.product-delete').click(ProductDelete);
});

function ProductDelete (e) {
    const target = $(e.currentTarget);
    const rowId = target.attr('data-id');
    const row = target.parent().parent();
    const url = '/products/' + rowId;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "DELETE",
        url: url,
        success: function (data) {
            row.remove();
            alert('продукт удалён');
        },
        error: function (jqXHR, text, error) {
            alert('Ошибка удаления продукта')
        }
    });
}
