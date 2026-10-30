const regexEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9][\.][a-z0-9]{2,4}$/;
function fn_valForm(){
    

    let nama = document.getElementById("nama").value;
    let email = document.getElementById("email").value;
    let umur = document.getElementById("umur").value;
    let koleksi_favorit = document.getElementById("kategori").value;
    let msg = "";

    if(nama == ""){
        msg += "Anda Belum Mengisi Nama \n";
    }

    if(email == ""){
        msg += "Anda Belum Mengisi email \n";
    }

    if(umur == ""){
        msg += "Anda Belum Mengisi umur \n";
    }

    if(koleksi_favorit == ""){
        msg += "Anda Belum Mengisi koleksi favorit \n";
    }

    if(!regexEmail.test(email)){
        msg += "Validation Email \n";
    }

    if(msg != ""){
        alert(`\n${msg}`);
        return false;
    }else{
        let ket;
        if(umur <= 17){
            ket = "Anggota Pelajar";
        }

        if(umur > 17){
            ket = "Annggota Umum";
        }

        let tempKategori;
        switch(koleksi_favorit){
            case "f":
                tempKategori = "Fiksi";
            break;
            case "n":
                tempKategori = "Non-Fiksi";
            break;
            case "j":
                tempKategori = "Jurnal Ilimah";
            break;
        }

        alert(`Terima kasih [${nama}]! Anda terdaftar di koleksi [${tempKategori}][${ket}]`);

        return true;
    }
}
