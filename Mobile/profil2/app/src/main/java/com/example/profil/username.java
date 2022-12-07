package com.example.profil;
import androidx.appcompat.app.AppCompatActivity;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
public class user extends AppCompatActivity{
    TableLayout table;
    String line, code;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.username);
        table = findViewById(R.id.table);
    }
    public <username> void fetch(View view) {
        // Create various messages to display in the app.
        Toast failed_toast = Toast.makeText(username.this, "Request failed", Toast.LENGTH_SHORT);
        Toast fetched_toast = Toast.makeText(username.this, "Data Fetched", Toast.LENGTH_SHORT);
        // Create a worker thread for sending HTTP requests.
        Thread thread = new Thread(new Runnable() {
            @Override
            public void run() {
                try {
                    URL url = new URL(Config.api_url1);                                                  // new url object is created
                    HttpURLConnection conn = (HttpURLConnection) url.openConnection();                  // HTTP connection object is created
                    BufferedReader rd = new BufferedReader(new InputStreamReader(
                            conn.getInputStream()));
                    while ((line = rd.readLine()) != null) {
                        String jsonString = "{" + " \"Data\": " + line + "}";                           // Get the response
                        try {
                            JSONObject jsonObject = new JSONObject(jsonString);
                            JSONArray array = jsonObject.getJSONArray("Data");
                            for (int i = 0; i < array.length(); i++) {
                                JSONObject oneObject = array.getJSONObject(i);
                                // Pulling items from the array
                                String username = oneObject.getString("username");
                                String email = oneObject.getString("email");
                                String fullname = oneObject.getString("Fullname");
                                String password = oneObject.getString("Password");
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        // Remove all child views
                                        table.removeAllViews();
                                        //Create new table row
                                        TableRow tr = new TableRow(username.this);
                                        tr.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.MATCH_PARENT, TableRow.LayoutParams.WRAP_CONTENT));
                                        createTextView(username, tr);                                      //Create new TextView for column 1
                                        createTextView(email, tr);                                      //Create new TextView for column 2
                                        createTextView(fullname, tr);                                     //Create new TextView for column 3
                                        createTextView(password, tr);                                     //Create new TextView for column 4
                                        // Add table row to Table View
                                        table.addView(tr, new TableLayout.LayoutParams(TableLayout.LayoutParams.MATCH_PARENT, TableLayout.LayoutParams.WRAP_CONTENT));
                                    }

                                    private void createTextView(String username, TableRow tr) {
                                    }
                                });
                                      } catch (JSONException e){
                                        e.printStackTrace();
                            }
                        }
                        code = String.valueOf(conn.getResponseCode());                                      // Get the HTTP status code
                        conn.disconnect();                                                                  // Disconnecting
                        // For unreachable network or other network related failures.
                        if (!code.equals("200")) {
                            failed_toast.show();
                        }
                        // Show data in a table form.
                        else {
                            fetched_toast.show();
                        }
                    } catch (MalformedURLException e) {
                        e.printStackTrace();
                        failed_toast.show();
                    } catch (IOException e) {
                        e.printStackTrace();
                        failed_toast.show();
                    }
                } catch (MalformedURLException e) {
                    e.printStackTrace();
                } catch (JSONException e) {
                    e.printStackTrace();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            });
                thread.start();


        public void createTextView(String text, TableRow tr) {
            TextView t = new TextView(username.this);
            t.setText(text);
            t.setTextColor(Color.parseColor("#00d9d9"));
            t.setTextSize(10);
            t.setLayoutParams(new TableRow.LayoutParams(TableRow.LayoutParams.WRAP_CONTENT, TableRow.LayoutParams.WRAP_CONTENT, 1f));
            tr.addView(t);
        }
    }