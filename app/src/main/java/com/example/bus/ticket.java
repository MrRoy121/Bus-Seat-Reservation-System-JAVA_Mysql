package com.example.bus;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.app.NotificationCompat;
import androidx.core.app.NotificationManagerCompat;
import androidx.core.content.ContextCompat;
import androidx.annotation.RequiresApi;

import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.os.StrictMode;
import android.text.format.DateFormat;
import android.view.View;
import android.widget.Button;
import android.widget.FrameLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.bus.Connection.RequestHandler;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.io.FileOutputStream;
import java.util.Date;
import java.util.HashMap;

public class ticket extends AppCompatActivity {

    public static final String URL_SEAT = "http://192.168.0.101/project/seat.php";
    private static final int PERMISSION_REQUEST_CODE = 1;
    FrameLayout r;
    SharedPreferences ss;
    public static final String MY_PREFERENCES = "MyPrefs";
    public static final String USERNAME = "username";
    public static final String ID1 = "ID";
    TextView uid1, uid2, uname;
    String ID, at;
    TextView rfrom, rfrom1, rat, rseat1, rseat2, rseat11, rseat21, t1, t2, d1, d2, r1, r2, b1, b2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ticket);

        Button home = findViewById(R.id.home);
        Button track = findViewById(R.id.track);

        rfrom = (TextView) findViewById(R.id.from);
        rfrom1 = (TextView) findViewById(R.id.from1);
        rat = (TextView) findViewById(R.id.at);
        t1 = (TextView) findViewById(R.id.t1);
        t2 = (TextView) findViewById(R.id.t2);
        d1 = (TextView) findViewById(R.id.d1);
        d2 = (TextView) findViewById(R.id.d2);
        r1 = (TextView) findViewById(R.id.r1);
        r2 = (TextView) findViewById(R.id.r2);
        b1 = (TextView) findViewById(R.id.b1);
        b2 = (TextView) findViewById(R.id.b2);
        rseat1 = (TextView) findViewById(R.id.seat1);
        rseat2 = (TextView) findViewById(R.id.seat2);
        rseat11 = (TextView) findViewById(R.id.seat11);
        rseat21 = (TextView) findViewById(R.id.seat21);

        ss = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        uname = findViewById(R.id.tid1);
        uid1 = findViewById(R.id.sid1);
        uid2 = findViewById(R.id.sid2);
        uname.setText(ss.getString(USERNAME,""));
        uid1.setText(ss.getString(ID1,""));
        uid2.setText(ss.getString(ID1,""));
        ID = ss.getString(ID1,"");


        Bundle bundle = getIntent().getExtras();
        String route = bundle.getString("route"), busid = bundle.getString("busid"), time = bundle.getString("time"), date = bundle.getString("date"),from = bundle.getString("From"), seat1 = bundle.getString("Seat1"), seat2= bundle.getString("Seat2");
        at= bundle.getString("At");
        rfrom.setText(from);
        rat.setText(at);
        rfrom1.setText(from);
        rseat1.setText(seat1);
        rseat2.setText(seat2);
        rseat11.setText(seat1);
        rseat21.setText(seat2);
        t1.setText(time);
        t2.setText(time);
        d1.setText(date);
        d2.setText(date);
        r1.setText(route);
        r2.setText(route);
        b1.setText(busid);
        b2.setText(busid);



        /*if (Build.VERSION.SDK_INT >= 23)
        {
            if (checkPermission())
            {

            } else {
                requestPermission(Manifest.permission.WRITE_EXTERNAL_STORAGE,
                        PERMISSION_REQUEST_CODE);
            }
        }
        else
        {
            Toast.makeText(ticket.this, "Your Device is Incompatible with this Feature.", Toast.LENGTH_LONG).show();
        }
*/

        home.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(ticket.this, MainActivity.class);
                startActivity(intent);
            }
        });

        track.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                //Intent intent = new Intent(ticket.this, MapsActivity.class);
                //startActivity(intent);
            }
        });




        class Seat extends AsyncTask<Void, Void, String> {

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
            }

            @Override
            protected String doInBackground(Void... voids) {
                RequestHandler requestHandler = new RequestHandler();
                HashMap<String, String> params = new HashMap<>();
                params.put("S1", seat1);
                params.put("S2", seat2);
                params.put("ID", ID);
                params.put("frm", from);
                params.put("route", route);
                params.put("busid", busid);
                params.put("time", time);
                params.put("date", date);
                return requestHandler.sendPostRequest(URL_SEAT, params);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try {
                    //converting response to json object
                    JSONObject obj = new JSONObject(s);
                    //if no error in response
                    if (!obj.getBoolean("error")) {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_LONG).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    Toast.makeText(ticket.this, "Exception: " + e, Toast.LENGTH_LONG).show();
                }
            }
        }

        Seat set = new Seat();
        set.execute();
    }
    private boolean checkPermission() {
        int result = ContextCompat.checkSelfPermission(ticket.this, android.Manifest.permission.WRITE_EXTERNAL_STORAGE);
        if (result == PackageManager.PERMISSION_GRANTED) {
            return true;
        } else {
            return false;
        }
    }

    private void requestPermission(String permission, int requestCode) {

        if (ActivityCompat.shouldShowRequestPermissionRationale(ticket.this, android.Manifest.permission.WRITE_EXTERNAL_STORAGE)) {

            ActivityCompat.requestPermissions(ticket.this,
                    new String[] { permission },
                    requestCode);

        }else {
            ActivityCompat.requestPermissions(ticket.this, new String[]{android.Manifest.permission.WRITE_EXTERNAL_STORAGE}, PERMISSION_REQUEST_CODE);
        }

    }

    /*@RequiresApi(api = Build.VERSION_CODES.JELLY_BEAN_MR2)
    public void screenShot(View view) {
        Date now = new Date();
        DateFormat.format("MM-dd_hh", now);

        StrictMode.VmPolicy.Builder builder = new StrictMode.VmPolicy.Builder();
        StrictMode.setVmPolicy(builder.build());
        builder.detectFileUriExposure();

        try {
            // image naming and path  to include sd card  appending name you choose for file
            String mPath = Environment.getExternalStorageDirectory().toString() + "/" +"Ticket "+ now + ".jpeg";

            // create bitmap screen capture
            r = (FrameLayout)findViewById(R.id.scren);
            r.setDrawingCacheEnabled(true);
            r.buildDrawingCache();
            r.setDrawingCacheEnabled(true);
            Bitmap bitmap = Bitmap.createBitmap(r.getDrawingCache());
            r.setDrawingCacheEnabled(false);

            File imageFile = new File(mPath);

            FileOutputStream outputStream = new FileOutputStream(imageFile);
            int quality = 70;
            bitmap.compress(Bitmap.CompressFormat.JPEG, quality, outputStream);
            outputStream.flush();
            outputStream.close();

            openScreenshot(imageFile);
        } catch (Throwable e) {
            // Several error may come out with file handling or DOM
            e.printStackTrace();
        }
    }

    private void openScreenshot(File imageFile) {
        Intent intent = new Intent();
        intent.setAction(Intent.ACTION_VIEW);
        Uri uri = Uri.fromFile(imageFile);
        intent.setDataAndType(uri, "image/*");
        startActivity(intent);
    }*/
}
