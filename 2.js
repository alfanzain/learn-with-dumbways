let isiArray = (baris, kolom) => {
    let angka = 2
    let output = ''

    // Perulangan pada baris
    for (let i = 0; i < baris; i++) {
        
        // Perulangan pada kolom
        for (let j = 0; j < kolom; j++) {
            output += angka + ' '

            angka += 6
        }

        console.log(output)
        output = ''
    }
}

isiArray(3,5)