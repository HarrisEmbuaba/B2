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
import com.example.po3.R;
import com.example.po3.Activity.detailbarang;
import com.example.po3.model.login.register.DataItem;
import com.squareup.picasso.Picasso;

import java.util.List;

public class AdapterBarang extends RecyclerView.Adapter<AdapterBarang.HolderData> {
     Context ctx;
     List<DataItem> listData;

    public AdapterBarang(Context ctx, List<DataItem> listData) {
        this.ctx = ctx;
        this.listData = listData;
    }

    @NonNull
    @Override
    public AdapterBarang.HolderData onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.kosongan, parent, false);
//        HolderData holder = new HolderData(layout);
        return new HolderData(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull HolderData holder, @SuppressLint("RecyclerView") int position) {
        DataItem db = listData.get(position);

        holder.tvId.setText(String.valueOf(db.getId()));
        holder.tvJenis.setText(String.valueOf(db.getBarangJenis()));
        holder.tvNama.setText(String.valueOf(db.getNamaBarang()));
        holder.tvHarga.setText(String.valueOf(db.getHarga()));
        holder.tvStok.setText(String.valueOf(db.getStok()));
        Picasso.get().load(ApiClient.IMAGES_URL+listData.get(position).getImage()).error(R.mipmap.ic_launcher).into(holder.ivIcon);
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent =  new Intent(view.getContext(), detailbarang.class);
                mIntent.putExtra("image", listData.get(position).getImage());
                mIntent.putExtra("barang_jenis", listData.get(position).getBarangJenis());
                mIntent.putExtra("nama_barang", listData.get(position).getNamaBarang());
                mIntent.putExtra("harga", listData.get(position).getHarga());
                mIntent.putExtra("deskripsi", listData.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return listData.size();
    }

    public class HolderData extends RecyclerView.ViewHolder {
        TextView tvId, tvJenis,tvNama,tvHarga, tvStok;
        ImageView ivIcon;

        public HolderData(@NonNull View itemView) {
            super(itemView);

            tvId = itemView.findViewById(R.id.tvId);
            tvJenis = itemView.findViewById(R.id.inpo);
            tvNama = itemView.findViewById(R.id.deskripsi);
            tvHarga = itemView.findViewById(R.id.harga);
            tvStok = itemView.findViewById(R.id.stok);
            ivIcon = itemView.findViewById(R.id.fotobunga);
        }
    }
}
