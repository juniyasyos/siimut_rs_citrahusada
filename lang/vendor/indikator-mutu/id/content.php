<?php

return [
    // Navigasi & Label Umum
    'navigation' => [
        'group' => 'Indikator Mutu',
        'title' => 'Unit Kerja',
        'plural' => 'Unit Kerja',
        'description' => 'Kelola unit kerja dalam sistem dengan efisien.',
    ],

    // Aksi
    'actions' => [
        'create' => 'Tambah Unit Kerja',
        'edit' => 'Edit Unit Kerja',
        'delete' => 'Hapus Unit Kerja',
        'restore' => 'Pulihkan Unit Kerja',
        'force_delete' => 'Hapus Permanen',
        'view' => 'Lihat Detail',
        'manage_users' => 'Kelola Pengguna',
        'save' => 'Simpan Perubahan',
        'cancel' => 'Batal',
    ],

    // Kolom/Form Field
    'fields' => [
        'id' => 'ID',
        'unit_name' => 'Nama Unit Kerja',
        'description' => 'Deskripsi',
        'created_at' => 'Dibuat Pada',
        'updated_at' => 'Diperbarui Pada',
        'users' => 'Pengguna',
        'user_id' => 'Pengguna',
        'position' => 'Jabatan',
    ],

    // Bagian Formulir
    'form' => [
        'unit' => [
            'title' => 'Informasi Unit Kerja',
            'description' => 'Isi detail unit kerja dengan benar.',
            'name_placeholder' => 'Masukkan nama unit kerja',
            'description_placeholder' => 'Tambahkan deskripsi singkat tentang unit kerja ini',
            'helper_text' => 'Nama unit harus unik dan maksimal 100 karakter.',
        ],
        'users' => [
            'title' => 'Pengguna dalam Unit Kerja',
            'description' => 'Tambahkan pengguna ke unit kerja ini.',
            'search_placeholder' => 'Cari pengguna...',
            'add_button' => 'Tambahkan Pengguna',
            'remove_button' => 'Hapus Pengguna',
        ],
    ],

    // Pesan & Notifikasi
    'messages' => [
        'created' => 'Unit kerja berhasil ditambahkan.',
        'updated' => 'Unit kerja berhasil diperbarui.',
        'deleted' => 'Unit kerja berhasil dihapus.',
        'restored' => 'Unit kerja berhasil dipulihkan.',
        'force_deleted' => 'Unit kerja telah dihapus secara permanen!',
        'confirm_delete' => 'Apakah Anda yakin ingin menghapus unit kerja ini?',
    ],

    // Filter & Pencarian
    'filters' => [
        'search' => 'Cari Unit Kerja...',
        'show_deleted' => 'Tampilkan yang Dihapus',
    ],

    // Kesalahan
    'errors' => [
        'not_found' => 'Unit kerja tidak ditemukan.',
        'cannot_delete' => 'Unit kerja ini tidak dapat dihapus karena masih digunakan.',
    ],
];
