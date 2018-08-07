<?php

use Illuminate\Database\Seeder;
use App\produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sp = new produk();
        $sp->kode_produk='BG9051';
        $sp->nama_produk='VOUCHERINET10KAXIS';
        $sp->kategori_produk='SP';
        $sp->satuan='PCS';
        $sp->jenis='GOODS';
        $sp->BOM='YA';
        $sp->harga_jual=0;
        $sp->tarif_pajak=0;
        $sp->diskon=0;
        $sp->komisi=0;
        $sp->status_produk=1;
        $sp->save();

        $sp2 = new produk();
        $sp2->kode_produk='BG9036';
        $sp2->nama_produk='ROUTER';
        $sp2->kategori_produk='SP';
        $sp2->satuan='PCS';
        $sp2->jenis='GOODS';
        $sp2->BOM='YA';
        $sp2->harga_jual=0;
        $sp2->tarif_pajak=0;
        $sp2->diskon=0;
        $sp2->komisi=0;
        $sp2->status_produk='1';
        $sp2->save();

        $sp3 = new produk();
        $sp3->kode_produk='BG9013';
        $sp3->nama_produk='PV50K';
        $sp3->kategori_produk='SP';
        $sp3->satuan='PCS';
        $sp3->jenis='GOODS';
        $sp3->BOM='YA';
        $sp3->harga_jual=0;
        $sp3->tarif_pajak=0;
        $sp3->diskon=0;
        $sp3->komisi=0;
        $sp3->status_produk=1;
        $sp3->save();

        $sp4 = new produk();
        $sp4->kode_produk='BG9012';
        $sp4->nama_produk='PV10K';
        $sp4->kategori_produk='SP';
        $sp4->satuan='PCS';
        $sp4->jenis='GOODS';
        $sp4->BOM='YA';
        $sp4->harga_jual=0;
        $sp4->tarif_pajak=0;
        $sp4->diskon=0;
        $sp4->komisi=0;
        $sp4->status_produk=1;
        $sp4->save();

        $sp5 = new produk();
        $sp5->kode_produk='BG9011';
        $sp5->nama_produk='PV2K';
        $sp5->kategori_produk='SP';
        $sp5->satuan='PCS';
        $sp5->jenis='GOODS';
        $sp5->BOM='YA';
        $sp5->harga_jual=0;
        $sp5->tarif_pajak=0;
        $sp5->diskon=0;
        $sp5->komisi=0;
        $sp5->status_produk=1;
        $sp5->save();

        $sp6 = new produk();
        $sp6->kode_produk='BG7038';
        $sp6->nama_produk='BRONET 2GB';
        $sp6->kategori_produk='SP';
        $sp6->satuan='PCS';
        $sp6->jenis='GOODS';
        $sp6->BOM='YA';
        $sp6->harga_jual=0;
        $sp6->tarif_pajak=0;
        $sp6->diskon=0;
        $sp6->komisi=0;
        $sp6->status_produk=1;
        $sp6->save();

        $sp7 = new produk();
        $sp7->kode_produk='BG7016';
        $sp7->nama_produk='BRONET 5GB ( 151 )';
        $sp7->kategori_produk='SP';
        $sp7->satuan='PCS';
        $sp7->jenis='GOODS';
        $sp7->BOM='YA';
        $sp7->harga_jual=0;
        $sp7->tarif_pajak=0;
        $sp7->diskon=0;
        $sp7->komisi=0;
        $sp7->status_produk=0;
        $sp7->save();

        $sp8 = new produk();
        $sp8->kode_produk='BG7015';
        $sp8->nama_produk='BRONET 2GB ( 151 )';
        $sp8->kategori_produk='SP';
        $sp8->satuan='PCS';
        $sp8->jenis='GOODS';
        $sp8->BOM='YA';
        $sp8->harga_jual=0;
        $sp8->tarif_pajak=0;
        $sp8->diskon=0;
        $sp8->komisi=0;
        $sp8->status_produk=0;
        $sp8->save();

        $sp9 = new produk();
        $sp9->kode_produk='BG6055';
        $sp9->nama_produk='SP0KAXISGAOL';
        $sp9->kategori_produk='SP';
        $sp9->satuan='PCS';
        $sp9->jenis='GOODS';
        $sp9->BOM='YA';
        $sp9->harga_jual=0;
        $sp9->tarif_pajak=0;
        $sp9->diskon=0;
        $sp9->komisi=0;
        $sp9->status_produk=1;
        $sp9->save();

        $sp10 = new produk();
        $sp10->kode_produk='BG6041';
        $sp10->nama_produk='SP0K Hitz';
        $sp10->kategori_produk='SP';
        $sp10->satuan='PCS';
        $sp10->jenis='GOODS';
        $sp10->BOM='YA';
        $sp10->harga_jual=0;
        $sp10->tarif_pajak=0;
        $sp10->diskon=0;
        $sp10->komisi=0;
        $sp10->status_produk=1;
        $sp10->save();

        $sp11 = new produk();
        $sp11->kode_produk='BG6040';
        $sp11->nama_produk='SP2KAXGAOL';
        $sp11->kategori_produk='SP';
        $sp11->satuan='PCS';
        $sp11->jenis='GOODS';
        $sp11->BOM='YA';
        $sp11->harga_jual=0;
        $sp11->tarif_pajak=0;
        $sp11->diskon=0;
        $sp11->komisi=0;
        $sp11->status_produk=0;
        $sp11->save();

        $sp12 = new produk();
        $sp12->kode_produk='BG4010';
        $sp12->nama_produk='CIP DOMPUL';
        $sp12->kategori_produk='CHIP DOMPUL';
        $sp12->satuan='PCS';
        $sp12->jenis='GOODS';
        $sp12->BOM='YA';
        $sp12->harga_jual=0;
        $sp12->tarif_pajak=0;
        $sp12->diskon=0;
        $sp12->komisi=0;
        $sp12->status_produk=1;
        $sp12->save();

        $sp13 = new produk();
        $sp13->kode_produk='BG3035';
        $sp13->nama_produk='MIFI';
        $sp13->kategori_produk='SP';
        $sp13->satuan='PCS';
        $sp13->jenis='GOODS';
        $sp13->BOM='YA';
        $sp13->harga_jual=0;
        $sp13->tarif_pajak=0;
        $sp13->diskon=0;
        $sp13->komisi=0;
        $sp13->status_produk=1;
        $sp13->save();

        $sp14 = new produk();
        $sp14->kode_produk='BG2039';
        $sp14->nama_produk='SP3KLTE128';
        $sp14->kategori_produk='SP';
        $sp14->satuan='PCS';
        $sp14->jenis='GOODS';
        $sp14->BOM='YA';
        $sp14->harga_jual=0;
        $sp14->tarif_pajak=0;
        $sp14->diskon=0;
        $sp14->komisi=0;
        $sp14->status_produk=0;
        $sp14->save();

        $sp15 = new produk();
        $sp15->kode_produk='BG2032';
        $sp15->nama_produk='SP0KDATALTEOP HOTRODXFLASH 4GB 60D';
        $sp15->kategori_produk='SP';
        $sp15->satuan='PCS';
        $sp15->jenis='GOODS';
        $sp15->BOM='YA';
        $sp15->harga_jual=0;
        $sp15->tarif_pajak=0;
        $sp15->diskon=0;
        $sp15->komisi=0;
        $sp15->status_produk=0;
        $sp15->save();

        $sp16 = new produk();
        $sp16->kode_produk='BG2008';
        $sp16->nama_produk='NOCAN SP3KAXISGAOL';
        $sp16->kategori_produk='SP';
        $sp16->satuan='PCS';
        $sp16->jenis='GOODS';
        $sp16->BOM='YA';
        $sp16->harga_jual=0;
        $sp16->tarif_pajak=0;
        $sp16->diskon=0;
        $sp16->komisi=0;
        $sp16->status_produk=1;
        $sp16->save();

        $sp17 = new produk();
        $sp17->kode_produk='BG2007';
        $sp17->nama_produk='SP3KAXISGAOL RELOAD';
        $sp17->kategori_produk='SP';
        $sp17->satuan='PCS';
        $sp17->jenis='GOODS';
        $sp17->BOM='YA';
        $sp17->harga_jual=0;
        $sp17->tarif_pajak=0;
        $sp17->diskon=0;
        $sp17->komisi=0;
        $sp17->status_produk=0;
        $sp17->save();

        $sp18 = new produk();
        $sp18->kode_produk='BG2006';
        $sp18->nama_produk='SP3KAXISGAOL AKTIF';
        $sp18->kategori_produk='SP';
        $sp18->satuan='PCS';
        $sp18->jenis='GOODS';
        $sp18->BOM='YA';
        $sp18->harga_jual=0;
        $sp18->tarif_pajak=0;
        $sp18->diskon=0;
        $sp18->komisi=0;
        $sp18->status_produk=0;
        $sp18->save();

        $sp19 = new produk();
        $sp19->kode_produk='BG2005';
        $sp19->nama_produk='SP3KAXISGAOL';
        $sp19->kategori_produk='SP';
        $sp19->satuan='PCS';
        $sp19->jenis='GOODS';
        $sp19->BOM='YA';
        $sp19->harga_jual=0;
        $sp19->tarif_pajak=0;
        $sp19->diskon=0;
        $sp19->komisi=0;
        $sp19->status_produk=1;
        $sp19->save();

        $sp20 = new produk();
        $sp20->kode_produk='BG12048';
        $sp20->nama_produk='SP3KXLNEWPRE';
        $sp20->kategori_produk='SP';
        $sp20->satuan='PCS';
        $sp20->jenis='GOODS';
        $sp20->BOM='YA';
        $sp20->harga_jual=0;
        $sp20->tarif_pajak=0;
        $sp20->diskon=0;
        $sp20->komisi=0;
        $sp20->status_produk=1;
        $sp20->save();

        $sp21 = new produk();
        $sp21->kode_produk='BG12047';
        $sp21->nama_produk='SP YOTOP';
        $sp21->kategori_produk='SP';
        $sp21->satuan='PCS';
        $sp21->jenis='GOODS';
        $sp21->BOM='YA';
        $sp21->harga_jual=0;
        $sp21->tarif_pajak=0;
        $sp21->diskon=0;
        $sp21->komisi=0;
        $sp21->status_produk=1;
        $sp21->save();

        $sp22 = new produk();
        $sp22->kode_produk='BG12046';
        $sp22->nama_produk='Combo Lite 12GB+';
        $sp22->kategori_produk='SP';
        $sp22->satuan='PCS';
        $sp22->jenis='GOODS';
        $sp22->BOM='YA';
        $sp22->harga_jual=0;
        $sp22->tarif_pajak=0;
        $sp22->diskon=0;
        $sp22->komisi=0;
        $sp22->status_produk=1;
        $sp22->save();

        $sp23 = new produk();
        $sp23->kode_produk='BG12045';
        $sp23->nama_produk='Combo Lite 8GB+';
        $sp23->kategori_produk='SP';
        $sp23->satuan='PCS';
        $sp23->jenis='GOODS';
        $sp23->BOM='YA';
        $sp23->harga_jual=0;
        $sp23->tarif_pajak=0;
        $sp23->diskon=0;
        $sp23->komisi=0;
        $sp23->status_produk=1;
        $sp23->save();

        $sp24 = new produk();
        $sp24->kode_produk='BG12044';
        $sp24->nama_produk='Combo Lite 4GB+';
        $sp24->kategori_produk='SP';
        $sp24->satuan='PCS';
        $sp24->jenis='GOODS';
        $sp24->BOM='YA';
        $sp24->harga_jual=0;
        $sp24->tarif_pajak=0;
        $sp24->diskon=0;
        $sp24->komisi=0;
        $sp24->status_produk=1;
        $sp24->save();

        $sp25 = new produk();
        $sp25->kode_produk='BG12043';
        $sp25->nama_produk='Combo Lite 2GB+';
        $sp25->kategori_produk='SP';
        $sp25->satuan='PCS';
        $sp25->jenis='GOODS';
        $sp25->BOM='YA';
        $sp25->harga_jual=0;
        $sp25->tarif_pajak=0;
        $sp25->diskon=0;
        $sp25->komisi=0;
        $sp25->status_produk=1;
        $sp25->save();

        $sp26 = new produk();
        $sp26->kode_produk='BG12042';
        $sp26->nama_produk='Combo Lite 1GB+';
        $sp26->kategori_produk='SP';
        $sp26->satuan='PCS';
        $sp26->jenis='GOODS';
        $sp26->BOM='YA';
        $sp26->harga_jual=0;
        $sp26->tarif_pajak=0;
        $sp26->diskon=0;
        $sp26->komisi=0;
        $sp26->status_produk=1;
        $sp26->save();

        $sp27 = new produk();
        $sp27->kode_produk='BG11054';
        $sp27->nama_produk='SP WHITELIST 16GB';
        $sp27->kategori_produk='SP';
        $sp27->satuan='PCS';
        $sp27->jenis='GOODS';
        $sp27->BOM='YA';
        $sp27->harga_jual=0;
        $sp27->tarif_pajak=0;
        $sp27->diskon=0;
        $sp27->komisi=0;
        $sp27->status_produk=1;
        $sp27->save();

        $sp28 = new produk();
        $sp28->kode_produk='BG11053';
        $sp28->nama_produk='SP WHITELIST 6GB convertan 16GB';
        $sp28->kategori_produk='SP';
        $sp28->satuan='PCS';
        $sp28->jenis='GOODS';
        $sp28->BOM='YA';
        $sp28->harga_jual=0;
        $sp28->tarif_pajak=0;
        $sp28->diskon=0;
        $sp28->komisi=0;
        $sp28->status_produk=1;
        $sp28->save();

        $sp29 = new produk();
        $sp29->kode_produk='BG11052';
        $sp29->nama_produk='SP WHITELIST 4GB convertan 10GB';
        $sp29->kategori_produk='SP';
        $sp29->satuan='PCS';
        $sp29->jenis='GOODS';
        $sp29->BOM='YA';
        $sp29->harga_jual=0;
        $sp29->tarif_pajak=0;
        $sp29->diskon=0;
        $sp29->komisi=0;
        $sp29->status_produk=1;
        $sp29->save();

        $sp30 = new produk();
        $sp30->kode_produk='BG11029';
        $sp30->nama_produk='SP WHITELIST 4 15GB';
        $sp30->kategori_produk='SP';
        $sp30->satuan='PCS';
        $sp30->jenis='GOODS';
        $sp30->BOM='YA';
        $sp30->harga_jual=0;
        $sp30->tarif_pajak=0;
        $sp30->diskon=0;
        $sp30->komisi=0;
        $sp30->status_produk=0;
        $sp30->save();

        $sp31 = new produk();
        $sp31->kode_produk='BG11028';
        $sp31->nama_produk='SP WHITELIST 2 10GB';
        $sp31->kategori_produk='SP';
        $sp31->satuan='PCS';
        $sp31->jenis='GOODS';
        $sp31->BOM='YA';
        $sp31->harga_jual=0;
        $sp31->tarif_pajak=0;
        $sp31->diskon=0;
        $sp31->komisi=0;
        $sp31->status_produk=0;
        $sp31->save();

        $sp32 = new produk();
        $sp32->kode_produk='BG11027';
        $sp32->nama_produk='SP WHITELIST 2+14GB';
        $sp32->kategori_produk='SP';
        $sp32->satuan='PCS';
        $sp32->jenis='GOODS';
        $sp32->BOM='YA';
        $sp32->harga_jual=0;
        $sp32->tarif_pajak=0;
        $sp32->diskon=0;
        $sp32->komisi=0;
        $sp32->status_produk=1;
        $sp32->save();

        $sp33 = new produk();
        $sp33->kode_produk='BG11026';
        $sp33->nama_produk='SP WHITELIST 1+9GB';
        $sp33->kategori_produk='SP';
        $sp33->satuan='PCS';
        $sp33->jenis='GOODS';
        $sp33->BOM='YA';
        $sp33->harga_jual=0;
        $sp33->tarif_pajak=0;
        $sp33->diskon=0;
        $sp33->komisi=0;
        $sp33->status_produk=1;
        $sp33->save();

        $sp34 = new produk();
        $sp34->kode_produk='BG11025';
        $sp34->nama_produk='SP WHITELIST 16 GB';
        $sp34->kategori_produk='SP';
        $sp34->satuan='PCS';
        $sp34->jenis='GOODS';
        $sp34->BOM='YA';
        $sp34->harga_jual=0;
        $sp34->tarif_pajak=0;
        $sp34->diskon=0;
        $sp34->komisi=0;
        $sp34->status_produk=0;
        $sp34->save();

        $sp35 = new produk();
        $sp35->kode_produk='BG11024';
        $sp35->nama_produk='SP WHITELIST 10 GB';
        $sp35->kategori_produk='SP';
        $sp35->satuan='PCS';
        $sp35->jenis='GOODS';
        $sp35->BOM='YA';
        $sp35->harga_jual=0;
        $sp35->tarif_pajak=0;
        $sp35->diskon=0;
        $sp35->komisi=0;
        $sp35->status_produk=0;
        $sp35->save();

        $sp36 = new produk();
        $sp36->kode_produk='BG11023';
        $sp36->nama_produk='SP WHITELIST 8GB';
        $sp36->kategori_produk='SP';
        $sp36->satuan='PCS';
        $sp36->jenis='GOODS';
        $sp36->BOM='YA';
        $sp36->harga_jual=0;
        $sp36->tarif_pajak=0;
        $sp36->diskon=0;
        $sp36->komisi=0;
        $sp36->status_produk=1;
        $sp36->save();

        $sp37 = new produk();
        $sp37->kode_produk='BG11022';
        $sp37->nama_produk='SP WHITELIST 6 GB';
        $sp37->kategori_produk='SP';
        $sp37->satuan='PCS';
        $sp37->jenis='GOODS';
        $sp37->BOM='YA';
        $sp37->harga_jual=0;
        $sp37->tarif_pajak=0;
        $sp37->diskon=0;
        $sp37->komisi=0;
        $sp37->status_produk=1;
        $sp37->save();

        $sp38 = new produk();
        $sp38->kode_produk='BG11021';
        $sp38->nama_produk='SP WHITELIST 5 GB';
        $sp38->kategori_produk='SP';
        $sp38->satuan='PCS';
        $sp38->jenis='GOODS';
        $sp38->BOM='YA';
        $sp38->harga_jual=0;
        $sp38->tarif_pajak=0;
        $sp38->diskon=0;
        $sp38->komisi=0;
        $sp38->status_produk=1;
        $sp38->save();

        $sp39 = new produk();
        $sp39->kode_produk='BG11020';
        $sp39->nama_produk='SP WHITELIST 4GB';
        $sp39->kategori_produk='SP';
        $sp39->satuan='PCS';
        $sp39->jenis='GOODS';
        $sp39->BOM='YA';
        $sp39->harga_jual=0;
        $sp39->tarif_pajak=0;
        $sp39->diskon=0;
        $sp39->komisi=0;
        $sp39->status_produk=1;
        $sp39->save();

        $sp40 = new produk();
        $sp40->kode_produk='BG11019';
        $sp40->nama_produk='SP WHITELIST 3GB';
        $sp40->kategori_produk='SP';
        $sp40->satuan='PCS';
        $sp40->jenis='GOODS';
        $sp40->BOM='YA';
        $sp40->harga_jual=0;
        $sp40->tarif_pajak=0;
        $sp40->diskon=0;
        $sp40->komisi=0;
        $sp40->status_produk=1;
        $sp40->save();

        $sp41 = new produk();
        $sp41->kode_produk='BG11018';
        $sp41->nama_produk='SP WHITELIST 2GB';
        $sp41->kategori_produk='SP';
        $sp41->satuan='PCS';
        $sp41->jenis='GOODS';
        $sp41->BOM='YA';
        $sp41->harga_jual=0;
        $sp41->tarif_pajak=0;
        $sp41->diskon=0;
        $sp41->komisi=0;
        $sp41->status_produk=1;
        $sp41->save();

        $sp42 = new produk();
        $sp42->kode_produk='BG11017';
        $sp42->nama_produk='SP WHITELIST 1 GB';
        $sp42->kategori_produk='SP';
        $sp42->satuan='PCS';
        $sp42->jenis='GOODS';
        $sp42->BOM='YA';
        $sp42->harga_jual=0;
        $sp42->tarif_pajak=0;
        $sp42->diskon=0;
        $sp42->komisi=0;
        $sp42->status_produk=1;
        $sp42->save();

        $sp43 = new produk();
        $sp43->kode_produk='BG11014';
        $sp43->nama_produk='SP WHITELIST 2 GB COMBO';
        $sp43->kategori_produk='SP';
        $sp43->satuan='PCS';
        $sp43->jenis='GOODS';
        $sp43->BOM='YA';
        $sp43->harga_jual=0;
        $sp43->tarif_pajak=0;
        $sp43->diskon=0;
        $sp43->komisi=0;
        $sp43->status_produk=0;
        $sp43->save();

        $sp44 = new produk();
        $sp44->kode_produk='BG1050';
        $sp44->nama_produk='SP0KAXISHITZ';
        $sp44->kategori_produk='SP';
        $sp44->satuan='PCS';
        $sp44->jenis='GOODS';
        $sp44->BOM='YA';
        $sp44->harga_jual=0;
        $sp44->tarif_pajak=0;
        $sp44->diskon=0;
        $sp44->komisi=0;
        $sp44->status_produk=1;
        $sp44->save();

        $sp45 = new produk();
        $sp45->kode_produk='BG1049';
        $sp45->nama_produk='SP0KXLNEWPRE';
        $sp45->kategori_produk='SP';
        $sp45->satuan='PCS';
        $sp45->jenis='GOODS';
        $sp45->BOM='YA';
        $sp45->harga_jual=0;
        $sp45->tarif_pajak=0;
        $sp45->diskon=0;
        $sp45->komisi=0;
        $sp45->status_produk=1;
        $sp45->save();

        $sp46 = new produk();
        $sp46->kode_produk='BG1037';
        $sp46->nama_produk='SP0KAXGAOL4G';
        $sp46->kategori_produk='SP';
        $sp46->satuan='PCS';
        $sp46->jenis='GOODS';
        $sp46->BOM='YA';
        $sp46->harga_jual=0;
        $sp46->tarif_pajak=0;
        $sp46->diskon=0;
        $sp46->komisi=0;
        $sp46->status_produk=1;
        $sp46->save();

        $sp47 = new produk();
        $sp47->kode_produk='BG10034';
        $sp47->nama_produk='SP0KDATALTEOP HOTRODXFLASH 10GB 60D';
        $sp47->kategori_produk='SP';
        $sp47->satuan='PCS';
        $sp47->jenis='GOODS';
        $sp47->BOM='YA';
        $sp47->harga_jual=0;
        $sp47->tarif_pajak=0;
        $sp47->diskon=0;
        $sp47->komisi=0;
        $sp47->status_produk=0;
        $sp47->save();

        $sp48 = new produk();
        $sp48->kode_produk='BG10033';
        $sp48->nama_produk='SP0KDATALTEOP HOTRODXFLASH 6GB 60D';
        $sp48->kategori_produk='SP';
        $sp48->satuan='PCS';
        $sp48->jenis='GOODS';
        $sp48->BOM='YA';
        $sp48->harga_jual=0;
        $sp48->tarif_pajak=0;
        $sp48->diskon=0;
        $sp48->komisi=0;
        $sp48->status_produk=0;
        $sp48->save();

        $sp49 = new produk();
        $sp49->kode_produk='BG10031';
        $sp49->nama_produk='SP0KDATALTEOP HOTRODXFLASH 2GB 60D';
        $sp49->kategori_produk='SP';
        $sp49->satuan='PCS';
        $sp49->jenis='GOODS';
        $sp49->BOM='YA';
        $sp49->harga_jual=0;
        $sp49->tarif_pajak=0;
        $sp49->diskon=0;
        $sp49->komisi=0;
        $sp49->status_produk=0;
        $sp49->save();

        $sp50 = new produk();
        $sp50->kode_produk='BG10030';
        $sp50->nama_produk='SP0KDATALTEOP HOTRODXFLASH 1 GB 60D';
        $sp50->kategori_produk='SP';
        $sp50->satuan='PCS';
        $sp50->jenis='GOODS';
        $sp50->BOM='YA';
        $sp50->harga_jual=0;
        $sp50->tarif_pajak=0;
        $sp50->diskon=0;
        $sp50->komisi=0;
        $sp50->status_produk=0;
        $sp50->save();

        $sp51 = new produk();
        $sp51->kode_produk='BG10009';
        $sp51->nama_produk='SP REPLACE';
        $sp51->kategori_produk='SP';
        $sp51->satuan='PCS';
        $sp51->jenis='GOODS';
        $sp51->BOM='YA';
        $sp51->harga_jual=0;
        $sp51->tarif_pajak=0;
        $sp51->diskon=0;
        $sp51->komisi=0;
        $sp51->status_produk=1;
        $sp51->save();

        $sp52 = new produk();
        $sp52->kode_produk='BG10004';
        $sp52->nama_produk='NOCAN SP0K DATALTEOP';
        $sp52->kategori_produk='SP';
        $sp52->satuan='PCS';
        $sp52->jenis='GOODS';
        $sp52->BOM='YA';
        $sp52->harga_jual=0;
        $sp52->tarif_pajak=0;
        $sp52->diskon=0;
        $sp52->komisi=0;
        $sp52->status_produk=1;
        $sp52->save();

        $sp53 = new produk();
        $sp53->kode_produk='BG10003';
        $sp53->nama_produk='SP0K DATALTEOP RELOAD';
        $sp53->kategori_produk='SP';
        $sp53->satuan='PCS';
        $sp53->jenis='GOODS';
        $sp53->BOM='YA';
        $sp53->harga_jual=0;
        $sp53->tarif_pajak=0;
        $sp53->diskon=0;
        $sp53->komisi=0;
        $sp53->status_produk=0;
        $sp53->save();

        $sp54 = new produk();
        $sp54->kode_produk='BG10002';
        $sp54->nama_produk='SP0K DATALTEOP AKTIF';
        $sp54->kategori_produk='SP';
        $sp54->satuan='PCS';
        $sp54->jenis='GOODS';
        $sp54->BOM='YA';
        $sp54->harga_jual=0;
        $sp54->tarif_pajak=0;
        $sp54->diskon=0;
        $sp54->komisi=0;
        $sp54->status_produk=0;
        $sp54->save();

        $sp55 = new produk();
        $sp55->kode_produk='BG10001';
        $sp55->nama_produk='SP0K DATALTEOP';
        $sp55->kategori_produk='SP';
        $sp55->satuan='PCS';
        $sp55->jenis='GOODS';
        $sp55->BOM='YA';
        $sp55->harga_jual=0;
        $sp55->tarif_pajak=0;
        $sp55->diskon=0;
        $sp55->komisi=0;
        $sp55->status_produk=1;
        $sp55->5ave();

        // $dompul = new produk();
        // $dompul->kode_produk='DOMPUL1';
        // $dompul->nama_produk='DOMPUL';
        // $dompul->kategori_produk='Dompul';
        // $dompul->satuan='PCS';
        // $dompul->jenis='GOODS';
        // $dompul->BOM='YA';
        // $dompul->harga_jual=100000;
        // $dompul->tarif_pajak=10;
        // $dompul->diskon=0.15;
        // $dompul->komisi=0.10;
        // $dompul->status_produk='tersedia';
        // $dompul->save();
        //
        // $dompul2 = new produk();
        // $dompul2->kode_produk='DOMPUL5';
        // $dompul2->nama_produk='DP5';
        // $dompul2->kategori_produk='Dompul';
        // $dompul2->satuan='PCS';
        // $dompul2->jenis='GOODS';
        // $dompul2->BOM='YA';
        // $dompul2->harga_jual=5000;
        // $dompul2->tarif_pajak=10;
        // $dompul2->diskon=0.15;
        // $dompul2->komisi=0.10;
        // $dompul2->status_produk='tersedia';
        // $dompul2->save();
        //
        // $dompul3 = new produk();
        // $dompul3->kode_produk='DOMPUL10';
        // $dompul3->nama_produk='DP10';
        // $dompul3->kategori_produk='Dompul';
        // $dompul3->satuan='PCS';
        // $dompul3->jenis='GOODS';
        // $dompul3->BOM='YA';
        // $dompul3->harga_jual=10000;
        // $dompul3->tarif_pajak=10;
        // $dompul3->diskon=0.15;
        // $dompul3->komisi=0.10;
        // $dompul3->status_produk='tersedia';
        // $dompul3->save();
    }
}
