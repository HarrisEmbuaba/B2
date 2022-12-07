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
import com.example.po3.model.login.register.DataItemKeranjang;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.List;

public class AdapterKeranjang extends RecyclerView.Adapter<AdapterKeranjang.HolderDataKeranjang> {
    Context ctx;
    List<DataItemKeranjang> listDataKeranjang;
    int count = 1;
    int total = 0;


    public AdapterKeranjang(Context ctx, List<DataItemKeranjang> listDataKeranjang) {
        this.ctx = ctx;
        this.listDataKeranjang = listDataKeranjang;
    }


    @NonNull
    @Override
    public AdapterKeranjang.HolderDataKeranjang onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.cardkeranjang, parent, false);
//        HolderData holder = new HolderData(layout);
        return new AdapterKeranjang.HolderDataKeranjang(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull AdapterKeranjang.HolderDataKeranjang holder, @SuppressLint("RecyclerView") int position) {
        DataItemKeranjang db = listDataKeranjang.get(position);

        String hrg = db.getHarga();
        int cv = Integer.parseInt(hrg);
        String hasilConvert = toRupiah(cv);
        holder.tvHarga.setText(String.valueOf(hasilConvert));
        holder.tvWarna.setText(String.valueOf(db.getWarna()));
        holder.tvVariasi.setText(String.valueOf(db.getUkuran()));
        holder.tvNama.setText(String.valueOf(db.getNamaBarang()));
        holder.tvJumlah.setText(String.valueOf(db.getJumlah()));
        holder.tvStok.setText(String.valueOf(db.getStok()));
        Picasso.get().load(ApiClient.IMAGES_URL + listDataKeranjang.get(position).getImage()).error(R.mipmap.ic_launcher).into(holder.ivIcon);

        holder.ivKurang.setOnClickListener(new View.OnClickListener() {
            @SuppressLint("SuspiciousIndentation")
            @Override
            public void onClick(View v) {
                if (count <= 1) count = 1;
                else
                    count--;
                holder.tvJumlah.setText("" + count);
//                holder.tvJumlah.setText(String.valueOf(db.getJumlah() + count));
                total = Integer.parseInt(holder.tvJumlah.getText().toString()) * Integer.parseInt(db.getHarga());
                String hasilConvert = toRupiah(total);
                holder.tvtotal.setText(hasilConvert);

            }
        });

        holder.ivJumlah.setOnClickListener(new View.OnClickListener() {
            @SuppressLint("SuspiciousIndentation")
            @Override
            public void onClick(View v) {
                if (count >= Integer.parseInt(holder.tvStok.getText().toString()));
                else
                    count++;
                holder.tvJumlah.setText("" + count);
                total = Integer.parseInt(holder.tvJumlah.getText().toString()) * Integer.parseInt(db.getHarga());
                String hasikConvert = toRupiah(total);
                holder.tvtotal.setText(hasikConvert);
            }
        });
    }

    @Override
    public int getItemCount() {
        return listDataKeranjang.size();
    }

    public class HolderDataKeranjang extends RecyclerView.ViewHolder {
        TextView tvHarga, tvVariasi, tvNama, tvJumlah, tvWarna, tvtotal, tvStok;
        ImageView ivIcon, ivKurang, ivJumlah;

        public HolderDataKeranjang(@NonNull View itemView) {
            super(itemView);

            tvHarga = itemView.findViewById(R.id.hpxharga);
            tvVariasi = itemView.findViewById(R.id.textVariasi);
            tvWarna = itemView.findViewById(R.id.textWarna);
            tvNama = itemView.findViewById(R.id.hpxjudul);
            tvJumlah = itemView.findViewById(R.id.hpxjumlah);
            ivIcon = itemView.findViewById(R.id.hpximage);
            ivKurang = itemView.findViewById(R.id.fkerximagemin);
            ivJumlah = itemView.findViewById(R.id.fkerximageplus);
            tvtotal = itemView.findViewById(R.id.hpxtotal);
            tvStok = itemView.findViewById(R.id.stokGone);


        }
    }

    public void  kali(){

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






