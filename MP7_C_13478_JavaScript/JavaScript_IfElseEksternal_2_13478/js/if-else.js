let iHari;
let sAnggota;

iHari = prompt("Masukan jumlah hari keterlambatan", 1);
sAnggota = prompt("Anggota Perpustakaan? (Y)ya atau (T)tidak", "Y");

if(iHari > 7){
    if(sAnggota == "Y"){
        alert(`Denda Rp 10.000, peminjaman dibekukan`);
    }else{
        alert(`Denda Rp 20.000, peminjaman dibekukan`);
    }
}else{
    if(sAnggota == "Y"){
        alert("Denda Rp 2.000");
    }else{
        alert("Denda Rp 5.000");
    }
}