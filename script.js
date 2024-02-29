document.addEventListener('DOMContentLoaded', function () {
    updateCurrentData();
});

function createData() {
    const ip = document.getElementById('ip').value;
    const exp = document.getElementById('exp').value;

    // Lakukan validasi data jika diperlukan

    // Simpan data ke file JSON atau server Anda
    // Contoh: menyimpan data ke variabel JavaScript untuk tujuan demo
    const newData = { ip, exp };
    saveData(newData);

    // Perbarui tampilan data
    updateCurrentData();
}

function updateData() {
    // Implementasikan logika pembaruan data sesuai kebutuhan
}

function deleteData() {
    // Implementasikan logika penghapusan data sesuai kebutuhan
}

function saveData(newData) {
    // Simpan data ke file JSON atau server Anda
    // Contoh: menyimpan data ke variabel JavaScript untuk tujuan demo
    let existingData = JSON.parse(localStorage.getItem('ipExpData')) || [];
    existingData.push(newData);
    localStorage.setItem('ipExpData', JSON.stringify(existingData));
}

function updateCurrentData() {
    // Ambil data dari file JSON atau server Anda
    // Contoh: mengambil data dari variabel JavaScript untuk tujuan demo
    const existingData = JSON.parse(localStorage.getItem('ipExpData')) || [];

    // Tampilkan data dalam bentuk teks di halaman HTML
    document.getElementById('currentData').textContent = JSON.stringify(existingData, null, 2);
}
