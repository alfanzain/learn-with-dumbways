let cetakPola = tinggi => {
    let output = '';

    // Perulangan pada baris
    for (let i = 1; i <= tinggi; i++) {

        // Perulangan mencetak spasi di bagian kiri piramida
        let j = 1
        for (; j < i; j++) {
            output += ' ';
        }

        // Perulangan mencetak asterisk di bagian setelahnya
        for (let k = j; k <= tinggi; k++) {
            output += '* ';
        }

        // Perulangan mencetak asterisk di bagian paling kanan piramida
        for (let k = j; k < tinggi; k++) {
            output += '* ';
        }
        
        // Mencetak variable output
        console.log(output);

        // Reset variable output untuk baris selanjutnya
        output = '';
    }
}

cetakPola(10)

create table [table name] (
    personid int(50) not null auto_increment primary key,
    firstname varchar(35),middlename varchar(50),lastname varchar(50) default 'bato');
