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

import java.util.List;

public class AdapterSearch extends RecyclerView.Adapter<AdapterSearch.HolderDataSearch> {

    Context ctx;
    List<DataBarang> listData5;

    public AdapterSearch(Context ctx, List<DataBarang> listData5) {
        this.ctx = ctx;
        this.listData5 = listData5;
    }

    @NonNull
    @Override
    public AdapterSearch.HolderDataSearch onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(ctx).inflate(R.layout.search, parent, false);
//        HolderData holder = new HolderData(layout);
        return new AdapterSearch.HolderDataSearch(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull AdapterSearch.HolderDataSearch holder, @SuppressLint("RecyclerView") int position) {
        DataBarang db = listData5.get(position);

        holder.tvId.setText(String.valueOf(db.getId()));
        holder.tvJenis.setText(String.valueOf(db.getJenis()));
        holder.tvNama.setText(String.valueOf(db.getNama()));
        holder.tvUkuran.setText(String.valueOf(db.getUkuran()));
        Picasso.get().load(ApiClient.IMAGES_URL+listData5.get(position).getImage()).error(R.mipmap.ic_launcher).into(holder.ivIcon);
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mIntent =  new Intent(view.getContext(), detailbarang.class);
                mIntent.putExtra("image", listData5.get(position).getImage());
                mIntent.putExtra("barang_jenis", listData5.get(position).getJenis());
                mIntent.putExtra("nama_barang", listData5.get(position).getNama());
                mIntent.putExtra("harga", listData5.get(position).getHarga());
                mIntent.putExtra("deskripsi", listData5.get(position).getDeskripsi());
                view.getContext().startActivity(mIntent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return 0;
    }

    public class HolderDataSearch extends RecyclerView.ViewHolder {
        TextView tvId, tvJenis,tvNama,tvUkuran;
        ImageView ivIcon;

        public HolderDataSearch(@NonNull View itemView) {
            super(itemView);

            tvId = itemView.findViewById(R.id.tvId);
            tvJenis = itemView.findViewById(R.id.tbucket);
            tvNama = itemView.findViewById(R.id.namabarang);
            tvUkuran = itemView.findViewById(R.id.ukuran);
            ivIcon = itemView.findViewById(R.id.imageView);
        }
    }
}
