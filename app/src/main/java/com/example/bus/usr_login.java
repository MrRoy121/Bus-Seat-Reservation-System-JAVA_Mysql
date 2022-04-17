package com.example.bus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.example.bus.Connection.RequestHandler;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class usr_login extends AppCompatActivity {

    public static final String URL_LOGIN = "http://192.168.0.101/project/login.php";
    EditText eID, ed_password;

    SharedPreferences sharedPreferences;
    public static final String MY_PREFERENCES = "MyPrefs";
    public static final String ID1 = "ID";
    public static final String STATUS = "status";
    public static final String USERNAME = "username";
    private boolean status;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_usr_login);

        eID = findViewById(R.id.ID);
        ed_password = findViewById(R.id.password);

        sharedPreferences = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        status = sharedPreferences.getBoolean(STATUS, false);
        if (status){
            finish();
            Intent intent = new Intent(usr_login.this, MainActivity.class);
            startActivity(intent);
        }
    }

    public void login(View view){
        final String ID = eID.getText().toString();
        final String password = ed_password.getText().toString();

        if(ID.isEmpty()|| password.isEmpty()){
            Toast.makeText(this, "Please fill all the fields", Toast.LENGTH_SHORT).show();
        }

        else {
            class Login extends AsyncTask<Void, Void, String> {
                ProgressDialog pdLoading = new ProgressDialog(usr_login.this);

                @Override
                protected void onPreExecute() {
                    super.onPreExecute();

                    //this method will be running on UI thread
                    pdLoading.setMessage("\tLoading...");
                    pdLoading.setCancelable(false);
                    pdLoading.show();
                }

                @Override
                protected String doInBackground(Void... voids) {
                    //creating request handler object
                    RequestHandler requestHandler = new RequestHandler();

                    //creating request parameters
                    HashMap<String, String> params = new HashMap<>();
                    params.put("studentid", ID);
                    params.put("password", password);

                    //returing the response
                    return requestHandler.sendPostRequest(URL_LOGIN, params);
                }

                @Override
                protected void onPostExecute(String s) {
                    super.onPostExecute(s);
                    pdLoading.dismiss();

                    try {
                        //converting response to json object
                        JSONObject obj = new JSONObject(s);
                        //if no error in response
                        if (!obj.getBoolean("error")) {
                            String username = obj.getString("studentName");

                            SharedPreferences.Editor editor = sharedPreferences.edit();
                            editor.putString(USERNAME, username);
                            editor.putString(ID1, ID);
                            editor.putBoolean(STATUS, true);
                            editor.apply();

                            finish();
                            Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_LONG).show();
                            Intent intent = new Intent(usr_login.this, MainActivity.class);
                            startActivity(intent);
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(usr_login.this, "Exception: " + e, Toast.LENGTH_LONG).show();
                    }
                }
            }

            Login login = new Login();
            login.execute();
        }
    }

    public void register(View view){
        finish();
        Intent intent = new Intent(usr_login.this, usr_register.class);
        startActivity(intent);
    }
}