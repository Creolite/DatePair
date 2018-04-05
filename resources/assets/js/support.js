var preWarn = function (type, title, action) {
    return confirm(action + ' ' + type + " '" + title + "' ?");
};

var httpPost = function (data) {
    $.ajax({
        type: 'POST', data: data, url: '/tickets',
        success: function (result) {
            alert('result: '+result);
        },
        error: function (result) {
            alert('error: '+JSON.stringify(result));
        }
    });
};

$('document').ready(function (e) {

    $(document)
        .on({
            click: function (e) {
                var element = $(this), ticket = element.parents('tr'),
                    key = element.attr('id').split('_')[1],
                    params = ticket.attr('id').split('_'),
                    id = params[2], title = params[3],
                    action = {cls:'Close', del:'Delete'}[key];
                if(preWarn('ticket', title, action)){
                    // httpPost('resolved=' + action);
                    element.attr('type', 'submit');
                }
            }
        }, 'button.t_cls, button.t_del')

    ; //.document

});