package com.example.po3.API;

import com.example.po3.model.login.register.CheckEmail;
import com.example.po3.model.login.register.Login;
import com.example.po3.model.login.register.Register;
import com.example.po3.model.login.register.ResponseBarang;
import com.example.po3.model.login.register.ResponseBarangBaru;
import com.example.po3.model.login.register.ResponseBucket;
import com.example.po3.model.login.register.ResponseEmail;
import com.example.po3.model.login.register.ResponseHampers;
import com.example.po3.model.login.register.ResponseInsertKeranjang;
import com.example.po3.model.login.register.ResponseKeranjang;
import com.example.po3.model.login.register.ResponseSeserahan;
import com.example.po3.model.login.register.UpdatePassword;
import com.example.po3.model.login.register.VerifEmail;


import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {
    @FormUrlEncoded
    @POST("login1.php")
    Call<Login> loginResponse(
            @Field("email") String email,
            @Field("pass") String pass
    );

    @FormUrlEncoded
    @POST("register1.php")
    Call<Register> registerResponse(
            @Field("nama") String nama,
            @Field("email") String email,
            @Field("pass") String pass
    );
    @GET("retrieve.php")
    Call<ResponseBarang> ardretriveData();

    @GET("retrieveNew.php")
    Call<ResponseBarangBaru> ardretriveNewData();

    @FormUrlEncoded
    @POST("DataVerif_Email.php")
    Call<ResponseEmail> getVerifEmail(
            @Field("id_user") String id_user
    );

    @FormUrlEncoded
    @POST("UpdateEmail.php")
    Call<VerifEmail> setUpdateEmail(
            @Field("id_user") String id_user
    );

    @FormUrlEncoded
    @POST("LupaPassword.php")
    Call<UpdatePassword> setNewPassword(
            @Field("email") String email,
            @Field("pass") String pass
    );

    @FormUrlEncoded
    @POST("CheckEmail.php")
    Call<CheckEmail> getCheckEmail(
            @Field("email") String email
    );

    @FormUrlEncoded
    @POST("bucket.php")
    Call<ResponseBucket> getBucket(
            @Field("barang_jenis") String barang_jenis
    );

    @FormUrlEncoded
    @POST("hampers.php")
    Call<ResponseHampers> getHampers(
            @Field("barang_jenis") String barang_jenis
    );

    @FormUrlEncoded
    @POST("seserahan.php")
    Call<ResponseSeserahan> getSeserahan(
            @Field("barang_jenis") String barang_jenis
    );

    @GET("keranjang.php")
    Call<ResponseKeranjang> getKeranjang();

    @FormUrlEncoded
    @POST("InsertKeranjang.php")
    Call<ResponseInsertKeranjang> SetKeranjang();





}
