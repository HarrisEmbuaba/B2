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

import java.util.List;

public class AdapterCari extends RecyclerView.Adapter<AdapterCari.HolderDataCari> {
    Context ctx;
    List<DataBarang> listCariData;

    public AdapterCari(Context ctx, List<DataBarang> listCariData) {
        this.ctx = ctx;
        this.listCariData = listCariData;
    }

    public void setFilteredList(List<DataBarang> filteredList) {
        this.listCariData = filteredList;
        notifyDataSetChanged();

    }

    @NonNull
    @Override
    public AdapterCari.HolderDataCari onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.search, parent, false);
//        HolderData holder = new HolderData(layout);
        return new AdapterCari.HolderDataCari(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull AdapterCari.HolderDataCari holder, @SuppressLint("RecyclerView") int position) {
        DataBarang db = listCariData.get(position);

        holder.tvId.setText(String.valueOf(db.getId()));
        holder.tvJenis.setText(String.valueOf(db.getJenis()));
        holder.tvNama.setText(String.valueOf(db.getNama()));
        holder.tvUkuran.setText(String.valueOf(db.getUkuran()));
        Picasso.get().load(ApiClient.IMAGES_URL+listCariData.get(position).getImage()).error(R.mipmap.ic_launcher).into(holder.ivIcon);
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent =  new Intent(view.getContext(), detailbarang.class);
                mIntent.putExtra("id", listCariData.get(position).getId());
                mIntent.putExtra("image", listCariData.get(position).getImage());
                mIntent.putExtra("barang_jenis", listCariData.get(position).getJenis());
                mIntent.putExtra("nama_barang", listCariData.get(position).getJenis());
                mIntent.putExtra("ukuran", listCariData.get(position).getUkuran());
                mIntent.putExtra("ukuran", listCariData.get(position).getUkuran());
                mIntent.putExtra("harga", listCariData.get(position).getHarga());
                mIntent.putExtra("deskripsi", listCariData.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return listCariData.size();
    }

    public class HolderDataCari extends RecyclerView.ViewHolder {
        TextView tvId, tvJenis,tvNama,tvUkuran;
        ImageView ivIcon;

        public HolderDataCari(@NonNull View itemView) {
            super(itemView);

            tvId = itemView.findViewById(R.id.tvIdSearch);
            tvJenis = itemView.findViewById(R.id.tbucket);
            tvNama = itemView.findViewById(R.id.namabarang);
            tvUkuran = itemView.findViewById(R.id.ukuran);
            ivIcon = itemView.findViewById(R.id.tvimageView);
        }
    }
}
