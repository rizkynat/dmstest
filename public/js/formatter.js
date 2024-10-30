function getUniqueByKeys(data, keys) {
    const seen = new Set();
    return data.filter(item => {
        const key = keys.map(k => item[k]).join('-');
        if (seen.has(key)) {
            return false;
        } else {
            seen.add(key);
            return true;
        }
    });
}

function encryptBase64(str, isEncode = true) {
    // Create Base64 Object
    let Base64 = {
        _keyStr:
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
        encode: function (e) {
            var t = "";
            var n, r, i, s, o, u, a;
            var f = 0;
            e = Base64._utf8_encode(e);
            while (f < e.length) {
                n = e.charCodeAt(f++);
                r = e.charCodeAt(f++);
                i = e.charCodeAt(f++);
                s = n >> 2;
                o = ((n & 3) << 4) | (r >> 4);
                u = ((r & 15) << 2) | (i >> 6);
                a = i & 63;
                if (isNaN(r)) {
                    u = a = 64;
                } else if (isNaN(i)) {
                    a = 64;
                }
                t =
                    t +
                    this._keyStr.charAt(s) +
                    this._keyStr.charAt(o) +
                    this._keyStr.charAt(u) +
                    this._keyStr.charAt(a);
            }
            return t;
        },
        decode: function (e) {
            var t = "";
            var n, r, i;
            var s, o, u, a;
            var f = 0;
            e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            while (f < e.length) {
                s = this._keyStr.indexOf(e.charAt(f++));
                o = this._keyStr.indexOf(e.charAt(f++));
                u = this._keyStr.indexOf(e.charAt(f++));
                a = this._keyStr.indexOf(e.charAt(f++));
                n = (s << 2) | (o >> 4);
                r = ((o & 15) << 4) | (u >> 2);
                i = ((u & 3) << 6) | a;
                t = t + String.fromCharCode(n);
                if (u != 64) {
                    t = t + String.fromCharCode(r);
                }
                if (a != 64) {
                    t = t + String.fromCharCode(i);
                }
            }
            t = Base64._utf8_decode(t);
            return t;
        },
        _utf8_encode: function (e) {
            e = e.replace(/\r\n/g, "\n");
            var t = "";
            for (var n = 0; n < e.length; n++) {
                var r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r);
                } else if (r > 127 && r < 2048) {
                    t += String.fromCharCode((r >> 6) | 192);
                    t += String.fromCharCode((r & 63) | 128);
                } else {
                    t += String.fromCharCode((r >> 12) | 224);
                    t += String.fromCharCode(((r >> 6) & 63) | 128);
                    t += String.fromCharCode((r & 63) | 128);
                }
            }
            return t;
        },
        _utf8_decode: function (e) {
            var t = "";
            var n = 0;
            var r = (c1 = c2 = 0);
            while (n < e.length) {
                r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r);
                    n++;
                } else if (r > 191 && r < 224) {
                    c2 = e.charCodeAt(n + 1);
                    t += String.fromCharCode(((r & 31) << 6) | (c2 & 63));
                    n += 2;
                } else {
                    c2 = e.charCodeAt(n + 1);
                    c3 = e.charCodeAt(n + 2);
                    t += String.fromCharCode(
                        ((r & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63)
                    );
                    n += 3;
                }
            }
            return t;
        },
    };

    let encoded = encodeURIComponent(Base64.encode(str));
    let decoded = Base64.decode(encodeURIComponent(str));
    if (isEncode) {
        return encoded;
    } else {
        return decoded;
    }
}

function strPadCode(val, lengthPad, strSpace) {
    let str_pad = val % 1 === 0 ? val.toString() : val;
    str_pad = str_pad.padStart(lengthPad, strSpace);

    return str_pad;
}

function currency(number, codeCountry) {
    const formatter = new Intl.NumberFormat(codeCountry).format(number);

    return formatter;
}

function currentDate() {
    var date = new Date().toJSON().slice(0, 10);
    var split = date.split("-");

    var year = split[0];
    var month = split[1];
    var day = split[2];

    date = year + "-" + month + "-" + day;

    return date;
}

function indonesian_date(date, isDay = false) {
    var dateSplit = date.split("-");

    var year = dateSplit[0];
    var month = dateSplit[1];
    var date = dateSplit[2];
    var dateObj = new Date(year, month - 1, date);
    year = dateObj.getFullYear();
    month = dateObj.getMonth();
    date = dateObj.getDate();
    day = dateObj.getDay();

    switch (day) {
        case 0:
            day = "Minggu";
            break;
        case 1:
            day = "Senin";
            break;
        case 2:
            day = "Selasa";
            break;
        case 3:
            day = "Rabu";
            break;
        case 4:
            day = "Kamis";
            break;
        case 5:
            day = "Jum'at";
            break;
        case 6:
            day = "Sabtu";
            break;
    }
    switch (month) {
        case 0:
            month = "Januari";
            break;
        case 1:
            month = "Februari";
            break;
        case 2:
            month = "Maret";
            break;
        case 3:
            month = "April";
            break;
        case 4:
            month = "Mei";
            break;
        case 5:
            month = "Juni";
            break;
        case 6:
            month = "Juli";
            break;
        case 7:
            month = "Agustus";
            break;
        case 8:
            month = "September";
            break;
        case 9:
            month = "Oktober";
            break;
        case 10:
            month = "November";
            break;
        case 11:
            month = "Desember";
            break;
    }

    if (isDay) {
        return day + ", " + date + " " + month + " " + year;
    } else {
        return date + " " + month + " " + year;
    }
}

function extractID(str) {
    // Regular expression to match the number at the beginning of the string
    const regex = /^(\d+)\//;
    const match = str.match(regex);

    // If there is a match, return the captured group (the number)
    if (match) {
        return match[1];
    }

    // If no match, return null or an appropriate value
    return null;
}
