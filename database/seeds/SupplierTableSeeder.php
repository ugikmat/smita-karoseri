<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier();
        $supplier->nama_supplier="XL";
        $supplier->alamat_supplier="Sidoarjo";
        $supplier->telepon_supplier="081938062644";
        $supplier->email_supplier="xladminn@gmail.com";
        $supplier->bank_supplier="Bank Mandiri";
        $supplier->norek_supplier="111458772135";
        $supplier->status_supplier="Aktif";
        $supplier->save();

        // $supplier = new Supplier();
        // $supplier->nama_supplier="SD ROS SDJ";
        // $supplier->alamat_supplier="Sidoarjo";
        // $supplier->telepon_supplier="081938062644";
        // $supplier->email_supplier="sdtuban@gmail.com";
        // $supplier->bank_supplier="Bank Mandiri";
        // $supplier->norek_supplier="111458772135";
        // $supplier->status_supplier="Aktif";
        // $supplier->save();
        //
        // $supplier2 = new Supplier();
        // $supplier2->nama_supplier="SD SIDOARJO";
        // $supplier2->alamat_supplier="Sidoarjo";
        // $supplier2->telepon_supplier="081938062641";
        // $supplier2->email_supplier="sdsidoarjo@gmail.com";
        // $supplier2->bank_supplier="Bank BRI";
        // $supplier2->norek_supplier="45644424132";
        // $supplier2->status_supplier="Aktif";
        // $supplier2->save();
        //
        // $supplier3 = new Supplier();
        // $supplier3->nama_supplier="SD MJK-JMB";
        // $supplier3->alamat_supplier="Mojokerto";
        // $supplier3->telepon_supplier="081938062642";
        // $supplier3->email_supplier="sdmojokerto@gmail.com";
        // $supplier3->bank_supplier="Bank BCA";
        // $supplier3->norek_supplier="940225465000";
        // $supplier3->status_supplier="Aktif";
        // $supplier3->save();
        //
        // $supplier4 = new Supplier();
        // $supplier4->nama_supplier="SD TUBAN";
        // $supplier4->alamat_supplier="Tuban";
        // $supplier4->telepon_supplier="081938062644";
        // $supplier4->email_supplier="sdtuban@gmail.com";
        // $supplier4->bank_supplier="Bank Mandiri";
        // $supplier4->norek_supplier="111458772135";
        // $supplier4->status_supplier="Aktif";
        // $supplier4->save();
        //
        // $supplier5 = new Supplier();
        // $supplier5->nama_supplier="MD SIDOARJO";
        // $supplier5->alamat_supplier="Sidoarjo";
        // $supplier5->telepon_supplier="081938062644";
        // $supplier5->email_supplier="sdtuban@gmail.com";
        // $supplier5->bank_supplier="Bank Mandiri";
        // $supplier5->norek_supplier="111458772135";
        // $supplier5->status_supplier="Aktif";
        // $supplier5->save();
        //
        // $supplier6 = new Supplier();
        // $supplier6->nama_supplier="MD MADIUN";
        // $supplier6->alamat_supplier="Madiun";
        // $supplier6->telepon_supplier="081938062644";
        // $supplier6->email_supplier="sdtuban@gmail.com";
        // $supplier6->bank_supplier="Bank Mandiri";
        // $supplier6->norek_supplier="111458772135";
        // $supplier6->status_supplier="Aktif";
        // $supplier6->save();
        //
        // $supplier7 = new Supplier();
        // $supplier7->nama_supplier="SD TUL-BLI-TRE";
        // $supplier7->alamat_supplier="Tulungagung";
        // $supplier7->telepon_supplier="081938062644";
        // $supplier7->email_supplier="sdtuban@gmail.com";
        // $supplier7->bank_supplier="Bank Mandiri";
        // $supplier7->norek_supplier="111458772135";
        // $supplier7->status_supplier="Aktif";
        // $supplier7->save();
        //
        // $supplier8 = new Supplier();
        // $supplier8->nama_supplier="SD KDR-NGK";
        // $supplier8->alamat_supplier="Kediri";
        // $supplier8->telepon_supplier="081938062644";
        // $supplier8->email_supplier="sdtuban@gmail.com";
        // $supplier8->bank_supplier="Bank Mandiri";
        // $supplier8->norek_supplier="111458772135";
        // $supplier8->status_supplier="Aktif";
        // $supplier8->save();
        //
        // $supplier9 = new Supplier();
        // $supplier9->nama_supplier="SD GRT-MDN-SRV";
        // $supplier9->alamat_supplier="Madiun";
        // $supplier9->telepon_supplier="081938062644";
        // $supplier9->email_supplier="sdtuban@gmail.com";
        // $supplier9->bank_supplier="Bank Mandiri";
        // $supplier9->norek_supplier="111458772135";
        // $supplier9->status_supplier="Aktif";
        // $supplier9->save();
        //
        // $supplier10 = new Supplier();
        // $supplier10->nama_supplier="SD MDN-MAG-NGA";
        // $supplier10->alamat_supplier="Madiun";
        // $supplier10->telepon_supplier="081938062644";
        // $supplier10->email_supplier="sdtuban@gmail.com";
        // $supplier10->bank_supplier="Bank Mandiri";
        // $supplier10->norek_supplier="111458772135";
        // $supplier10->status_supplier="Aktif";
        // $supplier10->save();
        //
        // $supplier11 = new Supplier();
        // $supplier11->nama_supplier="SD PCT-PNR";
        // $supplier11->alamat_supplier="Pacitan";
        // $supplier11->telepon_supplier="081938062644";
        // $supplier11->email_supplier="sdtuban@gmail.com";
        // $supplier11->bank_supplier="Bank Mandiri";
        // $supplier11->norek_supplier="111458772135";
        // $supplier11->status_supplier="Aktif";
        // $supplier11->save();
        //
        // $supplier12 = new Supplier();
        // $supplier12->nama_supplier="SD SERVER";
        // $supplier12->alamat_supplier="Sidoarjo";
        // $supplier12->telepon_supplier="081938062644";
        // $supplier12->email_supplier="sdtuban@gmail.com";
        // $supplier12->bank_supplier="Bank Mandiri";
        // $supplier12->norek_supplier="111458772135";
        // $supplier12->status_supplier="Aktif";
        // $supplier12->save();
        //
        // $supplier13 = new Supplier();
        // $supplier13->nama_supplier="BANGKALAN";
        // $supplier13->alamat_supplier="Sidoarjo";
        // $supplier13->telepon_supplier="081938062644";
        // $supplier13->email_supplier="sdtuban@gmail.com";
        // $supplier13->bank_supplier="Bank Mandiri";
        // $supplier13->norek_supplier="111458772135";
        // $supplier13->status_supplier="Aktif";
        // $supplier13->save();
        //
        // $supplier14 = new Supplier();
        // $supplier14->nama_supplier="BANGKALAN DISTRO";
        // $supplier14->alamat_supplier="Sidoarjo";
        // $supplier14->telepon_supplier="081938062644";
        // $supplier14->email_supplier="sdtuban@gmail.com";
        // $supplier14->bank_supplier="Bank Mandiri";
        // $supplier14->norek_supplier="111458772135";
        // $supplier14->status_supplier="Aktif";
        // $supplier14->save();
        //
        // $supplier15 = new Supplier();
        // $supplier15->nama_supplier="SAMPANG";
        // $supplier15->alamat_supplier="Sidoarjo";
        // $supplier15->telepon_supplier="081938062644";
        // $supplier15->email_supplier="sdtuban@gmail.com";
        // $supplier15->bank_supplier="Bank Mandiri";
        // $supplier15->norek_supplier="111458772135";
        // $supplier15->status_supplier="Aktif";
        // $supplier15->save();
        //
        // $supplier16 = new Supplier();
        // $supplier16->nama_supplier="SAMPANG DISTRO";
        // $supplier16->alamat_supplier="Sidoarjo";
        // $supplier16->telepon_supplier="081938062644";
        // $supplier16->email_supplier="sdtuban@gmail.com";
        // $supplier16->bank_supplier="Bank Mandiri";
        // $supplier16->norek_supplier="111458772135";
        // $supplier16->status_supplier="Aktif";
        // $supplier16->save();
        //
        // $supplier17 = new Supplier();
        // $supplier17->nama_supplier="MD MADURA";
        // $supplier17->alamat_supplier="Madura";
        // $supplier17->telepon_supplier="081938062644";
        // $supplier17->email_supplier="sdtuban@gmail.com";
        // $supplier17->bank_supplier="Bank Mandiri";
        // $supplier17->norek_supplier="111458772135";
        // $supplier17->status_supplier="Aktif";
        // $supplier17->save();
        //
        // $supplier18 = new Supplier();
        // $supplier18->nama_supplier="PAMEKASAN";
        // $supplier18->alamat_supplier="Sidoarjo";
        // $supplier18->telepon_supplier="081938062644";
        // $supplier18->email_supplier="sdtuban@gmail.com";
        // $supplier18->bank_supplier="Bank Mandiri";
        // $supplier18->norek_supplier="111458772135";
        // $supplier18->status_supplier="Aktif";
        // $supplier18->save();
        //
        // $supplier19 = new Supplier();
        // $supplier19->nama_supplier="PAMEKASAN DISTRO";
        // $supplier19->alamat_supplier="Sidoarjo";
        // $supplier19->telepon_supplier="081938062644";
        // $supplier19->email_supplier="sdtuban@gmail.com";
        // $supplier19->bank_supplier="Bank Mandiri";
        // $supplier19->norek_supplier="111458772135";
        // $supplier19->status_supplier="Aktif";
        // $supplier19->save();
        //
        // $supplier20 = new Supplier();
        // $supplier20->nama_supplier="SUMENEP";
        // $supplier20->alamat_supplier="Sidoarjo";
        // $supplier20->telepon_supplier="081938062644";
        // $supplier20->email_supplier="sdtuban@gmail.com";
        // $supplier20->bank_supplier="Bank Mandiri";
        // $supplier20->norek_supplier="111458772135";
        // $supplier20->status_supplier="Aktif";
        // $supplier20->save();
        //
        // $supplier21 = new Supplier();
        // $supplier21->nama_supplier="SUMENEP DISTRO";
        // $supplier21->alamat_supplier="Sidoarjo";
        // $supplier21->telepon_supplier="081938062644";
        // $supplier21->email_supplier="sdtuban@gmail.com";
        // $supplier21->bank_supplier="Bank Mandiri";
        // $supplier21->norek_supplier="111458772135";
        // $supplier21->status_supplier="Aktif";
        // $supplier21->save();
    }
}
