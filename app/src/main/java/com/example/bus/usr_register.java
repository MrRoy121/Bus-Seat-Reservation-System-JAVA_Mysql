package com.example.bus;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.InputType;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.CheckBox;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.example.bus.Connection.RequestHandler;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.List;

public class usr_register extends AppCompatActivity implements AdapterView.OnItemSelectedListener {

    EditText ed_username, ed_email, ed_password, eID, ephone, ebatch, edob, esection, esemester, epup;
    CheckBox c1, c2, c3, c4;
    DatePickerDialog picker;
    TextView tv;
    public String dept, route;
    public static final String URL_REGISTER = "http://192.168.0.101/project/register.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_usr_register);

        ed_username = findViewById(R.id.name);
        ed_email = findViewById(R.id.email);
        ed_password = findViewById(R.id.password);
        eID = findViewById(R.id.ID);
        ephone = findViewById(R.id.phone_no);
        ebatch = findViewById(R.id.batch);
        esection = findViewById(R.id.section);
        edob = findViewById(R.id.dob);
        esemester = findViewById(R.id.semester);
        epup = findViewById(R.id.pup);

        c1 = (CheckBox) findViewById(R.id.c1);
        c2 = (CheckBox) findViewById(R.id.c2);
        c3 = (CheckBox) findViewById(R.id.c3);
        c4 = (CheckBox) findViewById(R.id.c4);

        edob.setInputType(InputType.TYPE_NULL);
        edob.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final Calendar cldr = Calendar.getInstance();
                int day = cldr.get(Calendar.DAY_OF_MONTH);
                int month = cldr.get(Calendar.MONTH);
                int year = cldr.get(Calendar.YEAR);
                // date picker dialog
                picker = new DatePickerDialog(usr_register.this,
                        new DatePickerDialog.OnDateSetListener() {
                            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
                                edob.setText(dayOfMonth + "-" + (monthOfYear + 1) + "-" + year);
                            }
                        }, year, month, day);
                picker.show();
            }
        });

        tv = findViewById(R.id.tv);

        Spinner spinner = (Spinner) findViewById(R.id.spinner);
        spinner.setOnItemSelectedListener(this);

        List<String> categories = new ArrayList<String>();
        categories.add("   ");
        categories.add("English");
        categories.add("CSE");
        categories.add("EEE");
        categories.add("BBA");
        categories.add("Civil Engineering");
        categories.add("Architecture");
        categories.add("LAW");
        categories.add("HTM");
        categories.add("Bangla");
        ArrayAdapter<String> dataAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, categories);
        dataAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(dataAdapter);


    }


    public void onClick(View view) {

        switch (view.getId()) {
            case R.id.c1:
                if (c1.isChecked())
                    route = "01";
                c2.setChecked(false);
                c3.setChecked(false);
                c4.setChecked(false);
                break;
            case R.id.c2:
                if (c2.isChecked())
                    route = "02";
                c1.setChecked(false);
                c3.setChecked(false);
                c4.setChecked(false);
                break;
            case R.id.c3:
                if (c3.isChecked())
                    route = "03";
                c2.setChecked(false);
                c1.setChecked(false);
                c4.setChecked(false);
                break;
            case R.id.c4:
                if (c4.isChecked())
                    route = "04";
                c2.setChecked(false);
                c3.setChecked(false);
                c1.setChecked(false);
                break;
        }
    }



    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        // On selecting a spinner item

        if(position == 0){
            tv.setVisibility(View.VISIBLE);
        }else if(position == 1) {
            tv.setVisibility(View.INVISIBLE);
            dept = "English";
        }else if(position == 2) {
            tv.setVisibility(View.INVISIBLE);
            dept = "CSE";
        }else if(position == 3) {
            tv.setVisibility(View.INVISIBLE);
            dept = "EEE";
        }else if(position == 4) {
            tv.setVisibility(View.INVISIBLE);
            dept = "BBA";
        }else if(position == 5) {
            tv.setVisibility(View.INVISIBLE);
            dept = "Civil Engineering";
        }else if(position == 6) {
            tv.setVisibility(View.INVISIBLE);
            dept = "Architecture";
        }else if(position == 7) {
            tv.setVisibility(View.INVISIBLE);
            dept = "LAW";
        }else if(position == 8) {
            tv.setVisibility(View.INVISIBLE);
            dept = "HTM";
        }else if(position == 9) {
            tv.setVisibility(View.INVISIBLE);
            dept = "Bangla";
        }
    }

    public void onNothingSelected(AdapterView<?> arg0) {
        // TODO Auto-generated method stub
        tv.setVisibility(View.VISIBLE);
    }

    public void register(View view) {

        final String name = ed_username.getText().toString();
        final String email = ed_email.getText().toString();
        final String password = ed_password.getText().toString();
        final String ID = eID.getText().toString();
        final String phone = ephone.getText().toString();
        final String batch = ebatch.getText().toString();
        final String dob = edob.getText().toString();
        final String semester = esemester.getText().toString();
        final String pup = epup.getText().toString();
        final String section = esection.getText().toString();

        if(name.isEmpty() || email.isEmpty() || password.isEmpty() || ID.isEmpty() || phone.isEmpty() || batch.isEmpty() || dob.isEmpty() || dept.isEmpty()  || semester.isEmpty() || pup.isEmpty() || section.isEmpty() || route.isEmpty()){
            Toast.makeText(this, "Please fill all the fields", Toast.LENGTH_SHORT).show();
        }
        else {
            class Login extends AsyncTask<Void, Void, String> {
                ProgressDialog pdLoading = new ProgressDialog(usr_register.this);

                @Override
                protected void onPreExecute() {
                    super.onPreExecute();

                    pdLoading.setMessage("\tLoading...");
                    pdLoading.setCancelable(false);
                    pdLoading.show();
                }

                @Override
                protected String doInBackground(Void... voids) {

                    RequestHandler requestHandler = new RequestHandler();

                    HashMap<String, String> params = new HashMap<>();
                    params.put("studentName", name);
                    params.put("email", email);
                    params.put("password", password);
                    params.put("studentid", ID);
                    params.put("phone", phone);
                    params.put("section", section);
                    params.put("dept", dept);
                    params.put("dob", dob);
                    params.put("route", route);
                    params.put("pup", pup);
                    params.put("batch", batch);
                    params.put("semester", semester);

                    Log.d("1", String.valueOf(params));
                    return requestHandler.sendPostRequest(URL_REGISTER, params);

                }

                @Override
                protected void onPostExecute(String s) {
                    super.onPostExecute(s);
                    pdLoading.dismiss();

                    try {
                        JSONObject obj = new JSONObject(s);
                        if (!obj.getBoolean("error")) {
                            Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_LONG).show();
                            finish();
                            Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_LONG).show();
                            Intent intent = new Intent(usr_register.this, usr_login.class);
                            startActivity(intent);
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                        Toast.makeText(usr_register.this, "Exception: " + e, Toast.LENGTH_LONG).show();
                    }
                }
            }

            Login login = new Login();
            login.execute();
        }
    }

        public void login(View view){
            finish();
            Intent intent = new Intent(usr_register.this, usr_login.class);
            startActivity(intent);
        }

}