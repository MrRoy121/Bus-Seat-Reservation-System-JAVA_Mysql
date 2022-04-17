package com.example.bus;

import android.graphics.Bitmap;
import android.graphics.drawable.BitmapDrawable;
import android.os.AsyncTask;
import android.os.Bundle;

import androidx.fragment.app.FragmentActivity;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;
    String urlWebService = "http://192.168.0.101/pr/checkloca.php";



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);


    }
        @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
            class GJSON extends AsyncTask<Void, Void, String> {

                @Override
                protected void onPreExecute() {
                    super.onPreExecute();
                }


                @Override
                protected void onPostExecute(String s) {
                    super.onPostExecute(s);

                    try {
                        JSONArray jsonArray = new JSONArray(s);
                        String[] abc = new String[jsonArray.length()];
                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject obj = jsonArray.getJSONObject(i);
                            abc[i] = obj.getString("lng");
                        }
                        JSONArray jsoArray = new JSONArray(s);
                        String[] ac = new String[jsoArray.length()];
                        for (int i = 0; i < jsoArray.length(); i++) {
                            JSONObject obj = jsoArray.getJSONObject(i);
                            ac[i] = obj.getString("lat");
                        }
                        float latInt = Float.parseFloat(abc[0]);
                        float longInt = Float.parseFloat(ac[0]);

                        //24.870082225558754, 91.80453363290064


                        int height = 65;
                        int width = 100;
                        BitmapDrawable bitmapdraw = (BitmapDrawable)getResources().getDrawable(R.mipmap.logbus);
                        Bitmap b = bitmapdraw.getBitmap();
                        Bitmap smallMarker = Bitmap.createScaledBitmap(b, width, height, false);
                        LatLng LU = new LatLng(latInt, longInt);


                        MarkerOptions markerOptions = new MarkerOptions().position(LU)
                                .icon(BitmapDescriptorFactory.fromBitmap(smallMarker));
                        mMap.addMarker(markerOptions);
                        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(LU, 18f));
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

                @Override
                protected String doInBackground(Void... voids) {
                    try {
                        URL url = new URL(urlWebService);
                        HttpURLConnection con = (HttpURLConnection) url.openConnection();
                        StringBuilder sb = new StringBuilder();
                        BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(con.getInputStream()));
                        String json;
                        while ((json = bufferedReader.readLine()) != null) {
                            sb.append(json + "\n");
                        }
                        return sb.toString().trim();
                    } catch (Exception e) {
                        return null;
                    }
                }
            }
            GJSON getJSON = new GJSON();
            getJSON.execute();

    }
}
