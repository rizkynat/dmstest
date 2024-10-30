//ajax custom function
function ajaxCall(URL, type, dataType, data, isProcessData, isContentType, beforeSendFunc=null) {
    return $.ajax({
        url: URL,
        type: type,
        dataType:dataType,
        data: data,
        processData: isProcessData,
        contentType: isContentType,
        beforeSend: beforeSendFunc,
        async: true //true make code continue to next ex. click generate invoice will show loading until wait email send 
    });
}

//cookies
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodeCookie = decodeURIComponent(document.cookie);
    let dataCookie = decodeCookie.split(";");

    for (let i = 0; i < dataCookie.length; i++) {
        let c = dataCookie[i];
        while (c.charAt(0) == " ") {
            //if there is value ' ayam'  should be 'ayam'
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(name) {
    document.cookie = name + "=;  Max-Age=0; path=/; domain=" + location.host;
}


//  keyboard
function nextInput(idElement, eventKey) {
    $(idElement).on(eventKey, "input", function (event) {
        if (event.which == 13) {
            //event.preventDefault();
            var $this = $(event.target);
            var index = parseFloat($this.attr("data-index"));
            $('[data-index="' + (index + 1).toString() + '"]').focus();
        }
    });
}

//  activeCurrentPage
function currentPageMenu() {
    let pageName = location.pathname.split("/").find(function (element) {
        return element;
    });
    let urlGroup = {
        dataentry: ["dataentry"],
        register: ["register"],
    };
    if (typeof pageName != "undefined") {
        let foundKey = "";
        for (var key in urlGroup) {
            urlGroup[key].filter(function (value) {
                if (pageName === value) {
                    foundKey = key;
                }
            });

            if (foundKey === key) {
                break;
            }
        }

        $("span#" + foundKey).removeClass("hidden");
        $("a#" + foundKey).addClass("text-gray-800");
    }
}

function firstLetterCap(str) {
    const capitalized = str.charAt(0).toUpperCase() + str.slice(1);
    return capitalized;
}

const eachWordCap = str => str.replace(/(^\w|\s\w)(\S*)/g, (_,m1,m2) => m1.toUpperCase()+m2.toLowerCase())

function getParamURL(name) {
    var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
        window.location.href
    );
    if (results == null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}

//compress image
const compressImage = async (file, { quality = 1, type = file.type }) => {
    // Get as image data
    const imageBitmap = await createImageBitmap(file);

    // Draw to canvas
    const canvas = document.createElement("canvas");
    canvas.width = imageBitmap.width;
    canvas.height = imageBitmap.height;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(imageBitmap, 0, 0);

    // Turn into Blob
    const blob = await new Promise((resolve) =>
        canvas.toBlob(resolve, type, quality)
    );

    // Turn Blob into File
    return new File([blob], file.name, {
        type: blob.type,
    });
};

function previewImage(input, idElement) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#" + idElement)
                .attr("src", e.target.result)
                .width(56)
                .height(56);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//sorting data table
function sorting_table(idElement) {
    $(function () {
        $("#" + idElement + " th").append(
            '<div class="sort-icons"><span class="sort-asc"></span><span class="sort-desc"></span></div>'
        );
    });
    function sort_element(tbl_nth, dir) {
        var sorted = $(
            $("#" + idElement + " tbody tr td:nth-child(" + tbl_nth + ")")
                .toArray()
                .sort(function (a, b) {
                    var Aelement = a.innerText,
                        Belement = b.innerText;
                    if ($.isNumeric(Aelement) && $.isNumeric(Belement)) {
                        if (dir == "asc") return Aelement - Belement;
                        else return Belement - Aelement;
                    } else {
                        if (dir == "asc")
                            return Aelement.localeCompare(Belement);
                        else return Belement.localeCompare(Aelement);
                    }
                })
        );

        Object.keys(sorted).map((k) => {
            $(sorted[k])
                .closest("tr")
                .detach()
                .appendTo("#" + idElement + " tbody");
        });
    }
    var tbl_nth_before = 0;
    //sorting data
    $("#" + idElement + " th").click(function () {
        var dir = $(this).attr("data-dir") || "desc";
        var tbl_nth = $(this).index() + 1;

        dir = dir == "desc" ? "asc" : "desc";
        $(this).attr("data-dir", dir);
        var dir_icon =
            dir == "asc"
                ? '<div class="sort-icons"><span style=" border-bottom:3px solid rgba(0, 0, 0, 1);" class="sort-asc"></span><span class="sort-desc"></span></div>'
                : '<div class="sort-icons"><span class="sort-asc"></span><span style=" border-top:3px solid rgba(0, 0, 0, 1);" class="sort-desc"></span></div>';
        var dir_icon_disable =
            '<div class="sort-icons"><span style=" border-bottom:3px solid rgba(0, 0, 0, 0.5);" class="sort-asc"></span><span style=" border-top:3px solid rgba(0, 0, 0, 0.5);" class="sort-desc"></span></div>';
        $("#" + idElement + " th:nth-child(" + tbl_nth + ")")
            .find(".sort-icons")
            .remove();
        $("#" + idElement + " thead")
            .find(".sort-icons")
            .append();
        $(this).append(dir_icon);
        sort_element(tbl_nth, dir);
        if (tbl_nth_before != tbl_nth && tbl_nth_before != 0) {
            $("#" + idElement + " th:nth-child(" + tbl_nth_before + ")")
                .find(".sort-icons")
                .remove();

            $("#" + idElement + " th:nth-child(" + tbl_nth_before + ")").append(
                dir_icon_disable
            );
        }
        tbl_nth_before = tbl_nth;
    });
}
