package com.example.po3.Adapter;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.po3.API.ApiClient;
import com.example.po3.Activity.detailbarang;
import com.example.po3.R;
import com.example.po3.model.login.register.DataItemBucket;
import com.example.po3.model.login.register.DataItemHampers;
import com.example.po3.model.login.register.DataItemSeserahan;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.List;

public class AdapterSeserahan extends RecyclerView.Adapter<AdapterSeserahan.HolderDataSeserahan>{
    Context ctx;
    List<DataItemSeserahan> listData3;

    public AdapterSeserahan(Context ctx, List<DataItemSeserahan> listData3) {
        this.ctx = ctx;
        this.listData3 = listData3;
    }

    @NonNull
    @Override
    public AdapterSeserahan.HolderDataSeserahan onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.kosongan, parent, false);
//        HolderData holder = new HolderData(layout);
        return new AdapterSeserahan.HolderDataSeserahan(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull HolderDataSeserahan holder, @SuppressLint("RecyclerView") int position) {

        DataItemSeserahan db = listData3.get(position);

        holder.tvId.setText(String.valueOf(db.getId()));
        holder.tvJenis.setText(String.valueOf(db.getBarangJenis()));
        holder.tvNama.setText(String.valueOf(db.getNamaBarang()));
        String hrg = db.getHarga();
        int cv = Integer.parseInt(hrg);
        String hasilConvert = toRupiah(cv);
        holder.tvHarga.setText(String.valueOf(hasilConvert));
//        holder.tvStok.setText(String.valueOf(db.getStok()));
        Picasso.get().load(ApiClient.IMAGES_URL+listData3.get(position).getImage()).resize(150, 157).error(R.mipmap.ic_launcher).into(holder.ivIcon);

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent =  new Intent(view.getContext(), detailbarang.class);
                mIntent.putExtra("image", listData3.get(position).getImage());
                mIntent.putExtra("barang_jenis", listData3.get(position).getBarangJenis());
                mIntent.putExtra("nama_barang", listData3.get(position).getNamaBarang());
                mIntent.putExtra("ukuran", listData3.get(position).getUkuran());
                mIntent.putExtra("harga", listData3.get(position).getHarga());
                mIntent.putExtra("stok", listData3.get(position).getStok());
                mIntent.putExtra("deskripsi", listData3.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return listData3.size();
    }

    public class HolderDataSeserahan extends RecyclerView.ViewHolder {
        TextView tvId, tvJenis,tvNama,tvHarga, tvStok;
        ImageView ivIcon;

        public HolderDataSeserahan(@NonNull View itemView) {
            super(itemView);

            tvId = itemView.findViewById(R.id.tvId);
            tvJenis = itemView.findViewById(R.id.inpo);
            tvNama = itemView.findViewById(R.id.deskripsi);
            tvHarga = itemView.findViewById(R.id.harga);
//            tvStok = itemView.findViewById(R.id.stok);
            ivIcon = itemView.findViewById(R.id.fotobunga);
        }
    }
    public static String toRupiah(int rupiah){
        DecimalFormat kursIndonesia = (DecimalFormat) DecimalFormat.getCurrencyInstance();
        DecimalFormatSymbols formatRp = new DecimalFormatSymbols();

        formatRp.setCurrencySymbol("Rp. ");
        formatRp.setMonetaryDecimalSeparator('.');
        formatRp.setGroupingSeparator('.');
        kursIndonesia.setDecimalFormatSymbols(formatRp);
        return kursIndonesia.format(rupiah);
    }
}
