<?php
function formatRupiah($amount) {
    return 'RM ' . number_format($amount, 2);
}

function generateInvoiceNumber() {
    return 'INV-' . rand(10000, 99999);
}

function getProductById($id, $products) {
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return null;
}

function processOrder($postData, $products) {
    $nama_pelanggan = isset($postData['nama_pelanggan']) ? 
        htmlspecialchars(trim($postData['nama_pelanggan'])) : "Pelanggan";
    $tempahan_input = isset($postData['tempahan']) ? $postData['tempahan'] : [];
    
    $item_tempahan = [];
    $jumlah_besar = 0;

    foreach ($tempahan_input as $produk_id => $saiz_list) {
        $produk_detail = getProductById($produk_id, $products);
        
        if ($produk_detail) {
            foreach ($saiz_list as $saiz => $kuantiti) {
                $kuantiti = (int)$kuantiti;
                if ($kuantiti > 0 && isset($produk_detail['harga'][$saiz])) {
                    $harga_seunit = $produk_detail['harga'][$saiz];
                    $jumlah_harga = $kuantiti * $harga_seunit;
                    
                    $item_tempahan[] = [
                        'nama_produk' => $produk_detail['nama'],
                        'saiz' => ucwords(str_replace('_', ' ', $saiz)),
                        'harga_seunit' => $harga_seunit,
                        'kuantiti' => $kuantiti,
                        'jumlah_harga' => $jumlah_harga
                    ];
                    $jumlah_besar += $jumlah_harga;
                }
            }
        }
    }

    if ($jumlah_besar == 0) {
        return false;
    }

    return [
        'no_invois' => generateInvoiceNumber(),
        'nama_pelanggan' => $nama_pelanggan,
        'tarikh' => date("d/m/Y"),
        'items' => $item_tempahan,
        'jumlah_besar' => $jumlah_besar
    ];
}
?>