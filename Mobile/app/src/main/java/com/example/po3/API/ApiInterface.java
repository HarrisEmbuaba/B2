package com.example.po3.API;

import com.example.po3.model.login.register.Login;
import com.example.po3.model.login.register.Register;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface ApiInterface {
    @FormUrlEncoded
    @POST("login.php")
    Call<Login> loginResponse(
            @Field("email") String email,
            @Field("pass") String pass
    );
    @FormUrlEncoded
    @POST("register.php")
    Call<Register> registerResponse(
            @Field("nama") String nama,
            @Field("email") String email,
            @Field("pass") String pass
    );

}
