<?php
function getProdukData() {
    return [
        ['id'=>1,'nama'=>'Kuih Semperit','gambar'=>'kuih_semperit.png','harga'=>['pek_mini'=>2,'kecil'=>17,'besar'=>34]],
        ['id'=>2,'nama'=>'Biskut Mazola','gambar'=>'biskut_mazola.png','harga'=>['pek_mini'=>2,'kecil'=>20,'besar'=>40]],
        ['id'=>3,'nama'=>'Buah Pinggang','gambar'=>'buah_pinggang.jpg','harga'=>['pek_mini'=>2,'kecil'=>22,'besar'=>44]],
        ['id'=>4,'nama'=>'Tart Nanas','gambar'=>'tart_nanas.png','harga'=>['pek_mini'=>2,'kecil'=>25,'besar'=>50]],
    ];
}
function getProdukById($id){
    foreach(getProdukData() as $p) if($p['id']==$id) return $p;
    return null;
}