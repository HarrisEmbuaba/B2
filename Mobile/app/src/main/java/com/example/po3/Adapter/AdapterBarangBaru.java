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
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.List;

public class AdapterBarangBaru extends RecyclerView.Adapter<AdapterBarangBaru.HolderDataBaru> {

    Context ctx;
    List<DataBarang> listData1;

    public AdapterBarangBaru(Context ctx, List<DataBarang> listData1) {
        this.ctx = ctx;
        this.listData1 = listData1;
    }

    @NonNull
    @Override
    public AdapterBarangBaru.HolderDataBaru onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.kosongan, parent, false);
//        HolderData holder = new HolderData(layout);
        return new AdapterBarangBaru.HolderDataBaru(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull AdapterBarangBaru.HolderDataBaru holder, @SuppressLint("RecyclerView") int position) {

        DataBarang db = listData1.get(position);

        holder.tvId.setText(String.valueOf(db.getId()));
        holder.tvJenis.setText(String.valueOf(db.getJenis()));
        holder.tvNama.setText(String.valueOf(db.getNama()));
        String hrg = db.getHarga();
        int cv = Integer.parseInt(hrg);
        String hasilConvert = toRupiah(cv);
        holder.tvHarga.setText(String.valueOf(hasilConvert));
        holder.tvStok.setText(String.valueOf(db.getUkuran()));
        Picasso.get().load(ApiClient.IMAGES_URL+listData1.get(position).getImage()).error(R.mipmap.ic_launcher).into(holder.ivIcon);
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent =  new Intent(view.getContext(), detailbarang.class);
                mIntent.putExtra("image", listData1.get(position).getImage());
                mIntent.putExtra("barang_jenis", listData1.get(position).getJenis());
                mIntent.putExtra("nama_barang", listData1.get(position).getNama());
                mIntent.putExtra("harga", listData1.get(position).getHarga());
                mIntent.putExtra("deskripsi", listData1.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return listData1.size();
    }

    public class HolderDataBaru extends RecyclerView.ViewHolder {
        TextView tvId, tvJenis,tvNama,tvHarga, tvStok;
        ImageView ivIcon;

        public HolderDataBaru(@NonNull View itemView) {
            super(itemView);

            tvId = itemView.findViewById(R.id.tvId);
            tvJenis = itemView.findViewById(R.id.inpo);
            tvNama = itemView.findViewById(R.id.deskripsi);
            tvHarga = itemView.findViewById(R.id.harga);
            tvStok = itemView.findViewById(R.id.stok);
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
