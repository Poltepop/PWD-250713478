 var totalSpan;
var totalNode;
var hematNode;

function init() {
    totalSpan = document.getElementById("totalBayar");
    totalNode = totalSpan.firstChild;
    hematNode = document.getElementById("infoHemat").firstChild;
    hitungTotal();
}

function hitungTotal() {
    var harga = parseFloat(document.getElementById("harga").value);
    var diskon = parseFloat(document.getElementById("diskon").value);

    if (isNaN(diskon) || diskon < 0 || diskon > 100) {
        totalNode.data = "Diskon tidak valid!";
        totalSpan.style.color = "red";
        hematNode.data = "Anda hemat: Rp0";
    } else {
        var potongan = harga * (diskon / 100);
        var akhir = harga - potongan;

        totalNode.data = akhir;
        totalSpan.style.color = "green";
        hematNode.data = "Anda hemat: Rp" + potongan;
    }
}