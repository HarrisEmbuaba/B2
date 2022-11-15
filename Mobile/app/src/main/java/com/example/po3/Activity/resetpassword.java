package com.example.po3.Activity;

import android.app.Activity;
import android.os.Bundle;
import android.util.Patterns;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.example.po3.R;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;

public class resetpassword extends AppCompatActivity {
    private EditText emailedittext;
    private Button resetpasswordbutton;

    FirebaseAuth auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_resetpassword);
        notif(resetpassword.this);

        emailedittext = (EditText) findViewById(R.id.email2);
        resetpasswordbutton = (Button) findViewById(R.id.kirim);

        auth = FirebaseAuth.getInstance();
        resetpasswordbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                AturUlangSandi();
            }
        });

    }
    private void  AturUlangSandi(){
        String email = emailedittext.getText().toString().trim();

        if(email.isEmpty()){
            emailedittext.setError("Email tidak boleh kosong");
            emailedittext.requestFocus();
            return;
        }

        if (!Patterns.EMAIL_ADDRESS.matcher(email).matches()){
            emailedittext.setError("Harap berikan email yang valid");
            emailedittext.requestFocus();
            return;
        }

        auth.sendPasswordResetEmail(email).addOnCompleteListener(new OnCompleteListener<Void>() {
            @Override
            public void onComplete(@NonNull Task<Void> task) {

                if (task.isSuccessful()){
                    Toast.makeText(resetpassword.this,"Periksa email anda untuk mengatur ulang kata sandi", Toast.LENGTH_LONG).show();
                }else{
                    Toast.makeText(resetpassword.this, "Coba lagi!, sesuatu yang salah terjadi", Toast.LENGTH_LONG).show();
                }
            }
        });

    }
    public void notif(Activity activity){
        //change color notif bar
        Window window = this.getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.setStatusBarColor(this.getResources().getColor(R.color.coklat));
        //set icons notifbar
        View decor = activity.getWindow().getDecorView();
        decor.setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
    }
}