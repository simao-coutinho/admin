var DOMAIN = $('meta[name="domain"]').attr('content');
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var delay = 100;

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaaeeeeiiiioooouuuunc------";

    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}

function updateItemWithRedirect(url) {
    update(2,0,url)
}

function updateItemWithoutRedirect(id, url) {
    update(3,id,url)
}

function updateItemWithReload(id, url) {
    update(1, id, url);
}

function update(type, id, url) {
    var form = type === 3 ? $("#formId" + id) : $("#formId");
    var btn = document.getElementById(type === 3 ? "btnSave" + id : "btnSave");

    if (form.valid()) {
        btn.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Saving";

        $.ajax({
            type: "POST",
            url: domain + url + "update",
            data: form.serialize(),
            success: function (response) {
                btn.innerHTML = "Saved";

                switch (type) {
                    case 1:
                        setTimeout(function () {
                            if (id === 0) {
                                window.location.href = domain + url + 'show/' + response.id;
                            } else {
                                window.location.href = domain + url
                            }
                        }, delay);
                        break;
                    case 2:
                        setTimeout(function () {
                            window.location.href = domain + url
                        }, delay);
                        break;
                    case 3:
                        setTimeout(function () {
                            btn.innerHTML = "<i class='fas fa-sync-alt'></i> Update";
                        }, delay);
                        break;
                }
            }
        });
    }
}

function deleteItem(id, url, backUrl) {
    var response = confirm("Do you want to delete this item?");

    if (response === true) {
        var btn = document.getElementById("btnDelete");
        btn.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Deleting";

        $.ajax({
            type: "POST",
            url: url,
            data: {_token: CSRF_TOKEN, id: id},
            success: function (response) {
                btn.innerHTML = "Deleted";

                setTimeout(function () {
                    window.location.href = backUrl
                }, delay);
            }
        });
    }
}

function finishEvent(id, url) {
    var response = confirm("Do you want to finish this event?");

    if (response === true) {
        var btn = document.getElementById("btnFinish");
        btn.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Finishing";

        $.ajax({
            type: "POST",
            url: domain + url + "finish",
            data: {_token: CSRF_TOKEN, id: id},
            success: function (response) {
                btn.innerHTML = "Finished";

                setTimeout(function () {
                    window.location.href = domain + url
                }, delay);
            }
        });
    }
}

function scrollToId(id, url) {
    if ($('#' + id).length == 0) {
        window.location.href = url;
    } else {
        $('html,body').animate({
                scrollTop: $('#' + id).offset().top},
            'slow');
    }
}
