<?php

return [
    // Label & Judul
    'title' => 'Unit Kerja',
    'plural' => 'Unit-Unit Kerja',
    'navigation_group' => 'Indikator Mutu',
    'description' => 'Kelola unit kerja dalam sistem',

    // Aksi
    'actions' => [
        'create' => 'Tambah Unit Kerja',
        'edit' => 'Edit Unit Kerja',
        'delete' => 'Hapus Unit Kerja',
        'restore' => 'Pulihkan Unit Kerja',
        'force_delete' => 'Hapus Permanen',
        'view' => 'Lihat Detail',
    ],

    // Kolom
    'fields' => [
        'id' => 'ID',
        'unit_name' => 'Nama Unit Kerja',
        'description' => 'Deskripsi',
        'created_at' => 'Dibuat Pada',
        'updated_at' => 'Diperbarui Pada',
    ],

    // Validasi & Pesan
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
        'trashed' => 'Tampilkan yang Dihapus',
    ],

    // Kesalahan
    'errors' => [
        'not_found' => 'Unit kerja tidak ditemukan.',
        'cannot_delete' => 'Unit kerja ini tidak dapat dihapus karena masih digunakan.',
    ],
];
