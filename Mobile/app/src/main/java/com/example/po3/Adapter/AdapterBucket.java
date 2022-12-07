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
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItemBucket;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.List;

public class AdapterBucket extends RecyclerView.Adapter<AdapterBucket.HolderDataBucket>{
    Context ctx;
    List<DataItemBucket> listData2;

    public AdapterBucket(Context ctx, List<DataItemBucket> listData2) {
        this.ctx = ctx;
        this.listData2 = listData2;
    }

    @NonNull
    @Override
    public AdapterBucket.HolderDataBucket onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.kosongan, parent, false);
//        HolderData holder = new HolderData(layout);
        return new AdapterBucket.HolderDataBucket(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull AdapterBucket.HolderDataBucket holder, @SuppressLint("RecyclerView") int position) {
        DataItemBucket db = listData2.get(position);

        holder.tvId.setText(String.valueOf(db.getId()));
        holder.tvJenis.setText(String.valueOf(db.getBarangJenis()));
        holder.tvNama.setText(String.valueOf(db.getNamaBarang()));
        String hrg = db.getHarga();
        int cv = Integer.parseInt(hrg);
        String hasilConvert = toRupiah(cv);
        holder.tvHarga.setText(String.valueOf(hasilConvert));
//        holder.tvStok.setText(String.valueOf(db.getStok()));
        Picasso.get().load(ApiClient.IMAGES_URL+listData2.get(position).getImage()).resize(150, 157).error(R.mipmap.ic_launcher).into(holder.ivIcon);
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent =  new Intent(view.getContext(), detailbarang.class);
                mIntent.putExtra("image", listData2.get(position).getImage());
                mIntent.putExtra("barang_jenis", listData2.get(position).getBarangJenis());
                mIntent.putExtra("nama_barang", listData2.get(position).getNamaBarang());
                mIntent.putExtra("ukuran", listData2.get(position).getUkuran());
                mIntent.putExtra("harga", listData2.get(position).getHarga());
                mIntent.putExtra("stok", listData2.get(position).getStok());
                mIntent.putExtra("deskripsi", listData2.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return listData2.size();
    }

    public class HolderDataBucket extends RecyclerView.ViewHolder {
        TextView tvId, tvJenis,tvNama,tvHarga, tvStok;
        ImageView ivIcon;

        public HolderDataBucket(@NonNull View itemView) {
            super(itemView);

            tvId = itemView.findViewById(R.id.tvId);
            tvJenis = itemView.findViewById(R.id.inpo);
            tvNama = itemView.findViewById(R.id.deskripsi);
            tvHarga = itemView.findViewById(R.id.harga);
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
