package com.example.bus.Bus_seats;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.TableLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.bus.Fragments.bus_info;
import com.example.bus.Fragments.driver_info;
import com.example.bus.R;
import com.example.bus.ticket;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import static com.example.bus.bus_list.BusID;
import static com.example.bus.bus_list.Date;
import static com.example.bus.bus_list.Time;
import static com.example.bus.bus_list.Route;

public class seat_38 extends AppCompatActivity {

    String frm, seat1 = "", seat2 = "", aat, from, at;
    CheckBox m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, a1, b1, c1, d1, a2, b2, c2, d2, a3, b3, c3, d3, a4, b4, c4, d4, a5, b5, c5, d5, a6, b6, c6, d6, a7, b7, c7, d7, a8, b8, c8, d8, a9, b9, c9, d9, b, c;
    TextView tt1, tt2, tt3,tt4, tt5, tt6, tt7, tt8, tt9, tt10, pt1, pt2, pt3, pt4, pt5, pt6, pt7, pt8, pt9, pt10;
    int numberOfCheckboxesChecked = 0;
    String URL_CHECKSEAT = "http://192.168.0.101/project/checkseat.php?route=", URL_CHECKMAP = "http://192.168.0.101/project/checkmap.php?route=";
    private RequestQueue mRequestQueue;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_seat38);

        Button book = findViewById(R.id.book);
        Button businfo = findViewById(R.id.businfo);
        Button driverinfo = findViewById(R.id.driverinfo);


        Intent intent = getIntent();
        String route = intent.getStringExtra(Route);
        String busid = intent.getStringExtra(BusID);
        //String seatcount = intent.getStringExtra(Seatcount);
        //String driverid = intent.getStringExtra(DriverID);
        String time = intent.getStringExtra(Time);
        String date = intent.getStringExtra(Date);


        TextView troute = findViewById(R.id.route);
        TextView tbusid = findViewById(R.id.busid);
        //TextView tseatcount = findViewById(R.id.seatcount);
        //TextView tdriverid = findViewById(R.id.driverid);
        TextView ttime = findViewById(R.id.time);
        TextView tdate = findViewById(R.id.date);


        troute.setText(route);
        tbusid.setText(busid);
        ttime.setText(time);
        tdate.setText(date);


        book.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {

                if(seat1 == null || seat2 == null){
                    Toast.makeText(seat_38.this, "Please Select A Seat!!", Toast.LENGTH_LONG).show();
                }
                else if(from == null){
                    Toast.makeText(seat_38.this, "Please Select A Pick Up Point!!", Toast.LENGTH_LONG).show();
                }
                else{

                    Intent intent = new Intent(getApplicationContext(), ticket.class);
                    intent.putExtra("From", from);
                    intent.putExtra("At", at);
                    intent.putExtra("Seat1", seat1);
                    intent.putExtra("Seat2", seat2);
                    intent.putExtra("route", route);
                    intent.putExtra("busid", busid);
                    intent.putExtra("time", time);
                    intent.putExtra("date", date);
                    startActivity(intent);
                }
            }
        });
        businfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(seat_38.this, bus_info.class);
                startActivity(intent);
            }
        });
        driverinfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(seat_38.this, driver_info.class);
                startActivity(intent);
            }
        });
        {

            m1 = (CheckBox) findViewById(R.id.ma);
            m2 = (CheckBox) findViewById(R.id.mb);
            m3 = (CheckBox) findViewById(R.id.mc);
            m4 = (CheckBox) findViewById(R.id.md);
            m5 = (CheckBox) findViewById(R.id.me);
            m6 = (CheckBox) findViewById(R.id.mf);
            m7 = (CheckBox) findViewById(R.id.mg);
            m8 = (CheckBox) findViewById(R.id.mh);
            m9 = (CheckBox) findViewById(R.id.mi);
            m10 = (CheckBox) findViewById(R.id.mj);


            a1 = (CheckBox) findViewById(R.id.a1);
            b1 = (CheckBox) findViewById(R.id.b1);
            c1 = (CheckBox) findViewById(R.id.c1);
            d1 = (CheckBox) findViewById(R.id.d1);
            a2 = (CheckBox) findViewById(R.id.a2);
            b2 = (CheckBox) findViewById(R.id.b2);
            c2 = (CheckBox) findViewById(R.id.c2);
            d2 = (CheckBox) findViewById(R.id.d2);
            a3 = (CheckBox) findViewById(R.id.a3);
            b3 = (CheckBox) findViewById(R.id.b3);
            c3 = (CheckBox) findViewById(R.id.c3);
            d3 = (CheckBox) findViewById(R.id.d3);
            a4 = (CheckBox) findViewById(R.id.a4);
            b4 = (CheckBox) findViewById(R.id.b4);
            c4 = (CheckBox) findViewById(R.id.c4);
            d4 = (CheckBox) findViewById(R.id.d4);
            a5 = (CheckBox) findViewById(R.id.a5);
            b5 = (CheckBox) findViewById(R.id.b5);
            c5 = (CheckBox) findViewById(R.id.c5);
            d5 = (CheckBox) findViewById(R.id.d5);
            a6 = (CheckBox) findViewById(R.id.a6);
            b6 = (CheckBox) findViewById(R.id.b6);
            c6 = (CheckBox) findViewById(R.id.c6);
            d6 = (CheckBox) findViewById(R.id.d6);
            a7 = (CheckBox) findViewById(R.id.a7);
            b7 = (CheckBox) findViewById(R.id.b7);
            c7 = (CheckBox) findViewById(R.id.c7);
            d7 = (CheckBox) findViewById(R.id.d7);
            a8 = (CheckBox) findViewById(R.id.a8);
            b8 = (CheckBox) findViewById(R.id.b8);
            c8 = (CheckBox) findViewById(R.id.c8);
            d8 = (CheckBox) findViewById(R.id.d8);
            a9 = (CheckBox) findViewById(R.id.a9);
            b9 = (CheckBox) findViewById(R.id.b9);
            c9 = (CheckBox) findViewById(R.id.c9);
            d9 = (CheckBox) findViewById(R.id.d9);
            b = (CheckBox) findViewById(R.id.b);
            c = (CheckBox) findViewById(R.id.c);

            tt1 = (TextView) findViewById(R.id.t1);
            tt2 = (TextView) findViewById(R.id.t2);
            tt3 = (TextView) findViewById(R.id.t3);
            tt4 = (TextView) findViewById(R.id.t4);
            tt5 = (TextView) findViewById(R.id.t5);
            tt6 = (TextView) findViewById(R.id.t6);
            tt7 = (TextView) findViewById(R.id.t7);
            tt8 = (TextView) findViewById(R.id.t8);
            tt9 = (TextView) findViewById(R.id.t9);
            tt10 = (TextView) findViewById(R.id.t10);
            pt1 = (TextView) findViewById(R.id.p1);
            pt2 = (TextView) findViewById(R.id.p2);
            pt3 = (TextView) findViewById(R.id.p3);
            pt4 = (TextView) findViewById(R.id.p4);
            pt5 = (TextView) findViewById(R.id.p5);
            pt6 = (TextView) findViewById(R.id.p6);
            pt7 = (TextView) findViewById(R.id.p7);
            pt8 = (TextView) findViewById(R.id.p8);
            pt9 = (TextView) findViewById(R.id.p9);
            pt10 = (TextView) findViewById(R.id.p10);

        }


        mRequestQueue = Volley.newRequestQueue(this);

        String url = URL_CHECKSEAT+route+"&busid="+busid;

        StringRequest request = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String products) {
                        try {
                            JSONArray jsonArray = new JSONArray(products);

                            for (int i = 0; i < jsonArray.length(); i++) {

                                JSONObject hit = jsonArray.getJSONObject(i);

                                String seat = hit.getString("seat");
                                {
                                    if (seat.equals("a1")) {
                                        a1.setBackgroundResource(R.drawable.seat_booked);
                                        a1.setEnabled(false);
                                    }
                                    if (seat.equals("b1")) {
                                        b1.setBackgroundResource(R.drawable.seat_booked);
                                        b1.setEnabled(false);
                                    }
                                    if (seat.equals("c1")) {
                                        c1.setBackgroundResource(R.drawable.seat_booked);
                                        c1.setChecked(false);
                                    }
                                    if (seat.equals("d1")) {
                                        d1.setBackgroundResource(R.drawable.seat_booked);
                                        d1.setChecked(false);
                                    }
                                    if (seat.equals("a2")) {
                                        a2.setBackgroundResource(R.drawable.seat_booked);
                                        a2.setChecked(false);
                                    }
                                    if (seat.equals("b2")) {
                                        b2.setBackgroundResource(R.drawable.seat_booked);
                                        b2.setEnabled(false);
                                    }
                                    if (seat.equals("c2")) {
                                        c2.setBackgroundResource(R.drawable.seat_booked);
                                        c2.setChecked(false);
                                    }
                                    if (seat.equals("d2")) {
                                        d2.setBackgroundResource(R.drawable.seat_booked);
                                        d2.setChecked(false);
                                    }
                                    if (seat.equals("a3")) {
                                        a3.setBackgroundResource(R.drawable.seat_booked);
                                        a3.setEnabled(false);
                                    }
                                    if (seat.equals("b3")) {
                                        b3.setBackgroundResource(R.drawable.seat_booked);
                                        b3.setEnabled(false);
                                    }
                                    if (seat.equals("c3")) {
                                        c3.setBackgroundResource(R.drawable.seat_booked);
                                        c3.setChecked(false);
                                    }
                                    if (seat.equals("d3")) {
                                        d3.setBackgroundResource(R.drawable.seat_booked);
                                        d3.setChecked(false);
                                    }
                                    if (seat.equals("a4")) {
                                        a4.setBackgroundResource(R.drawable.seat_booked);
                                        a4.setEnabled(false);
                                    }
                                    if (seat.equals("b4")) {
                                        b4.setBackgroundResource(R.drawable.seat_booked);
                                        b4.setEnabled(false);
                                    }
                                    if (seat.equals("c4")) {
                                        c4.setBackgroundResource(R.drawable.seat_booked);
                                        c4.setChecked(false);
                                    }
                                    if (seat.equals("d4")) {
                                        d4.setBackgroundResource(R.drawable.seat_booked);
                                        d4.setChecked(false);
                                    }
                                    if (seat.equals("a5")) {
                                        a5.setBackgroundResource(R.drawable.seat_booked);
                                        a5.setEnabled(false);
                                    }
                                    if (seat.equals("b5")) {
                                        b5.setBackgroundResource(R.drawable.seat_booked);
                                        b5.setEnabled(false);
                                    }
                                    if (seat.equals("c5")) {
                                        c5.setBackgroundResource(R.drawable.seat_booked);
                                        c5.setChecked(false);
                                    }
                                    if (seat.equals("d5")) {
                                        d5.setBackgroundResource(R.drawable.seat_booked);
                                        d5.setChecked(false);
                                    }
                                    if (seat.equals("a6")) {
                                        a6.setBackgroundResource(R.drawable.seat_booked);
                                        a6.setEnabled(false);
                                    }
                                    if (seat.equals("b6")) {
                                        b6.setBackgroundResource(R.drawable.seat_booked);
                                        b6.setEnabled(false);
                                    }
                                    if (seat.equals("c6")) {
                                        c6.setBackgroundResource(R.drawable.seat_booked);
                                        c6.setChecked(false);
                                    }
                                    if (seat.equals("d6")) {
                                        d6.setBackgroundResource(R.drawable.seat_booked);
                                        d6.setChecked(false);
                                    }
                                    if (seat.equals("a7")) {
                                        a7.setBackgroundResource(R.drawable.seat_booked);
                                        a7.setEnabled(false);
                                    }
                                    if (seat.equals("b7")) {
                                        b7.setBackgroundResource(R.drawable.seat_booked);
                                        b7.setEnabled(false);
                                    }
                                    if (seat.equals("c7")) {
                                        c7.setBackgroundResource(R.drawable.seat_booked);
                                        c7.setChecked(false);
                                    }
                                    if (seat.equals("d7")) {
                                        d7.setBackgroundResource(R.drawable.seat_booked);
                                        d7.setChecked(false);
                                    }
                                    if (seat.equals("a8")) {
                                        a8.setBackgroundResource(R.drawable.seat_booked);
                                        a8.setEnabled(false);
                                    }
                                    if (seat.equals("b8")) {
                                        b8.setBackgroundResource(R.drawable.seat_booked);
                                        b8.setEnabled(false);
                                    }
                                    if (seat.equals("c8")) {
                                        c8.setBackgroundResource(R.drawable.seat_booked);
                                        c8.setChecked(false);
                                    }
                                    if (seat.equals("d8")) {
                                        d8.setBackgroundResource(R.drawable.seat_booked);
                                        d8.setChecked(false);
                                    }
                                    if (seat.equals("a9")) {
                                        a9.setBackgroundResource(R.drawable.seat_booked);
                                        a9.setEnabled(false);
                                    }
                                    if (seat.equals("b9")) {
                                        b9.setBackgroundResource(R.drawable.seat_booked);
                                        b9.setEnabled(false);
                                    }
                                    if (seat.equals("c9")) {
                                        c9.setBackgroundResource(R.drawable.seat_booked);
                                        c9.setChecked(false);
                                    }
                                    if (seat.equals("d9")) {
                                        d9.setBackgroundResource(R.drawable.seat_booked);
                                        d9.setChecked(false);
                                    }
                                    if (seat.equals("b")) {
                                        b.setBackgroundResource(R.drawable.seat_booked);
                                        b.setEnabled(false);
                                    }
                                    if (seat.equals("c")) {
                                        c.setBackgroundResource(R.drawable.seat_booked);
                                        c.setChecked(false);
                                    }
                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        mRequestQueue.add(request);

        {

            a1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a1";
                            } else {
                                seat2 = "a1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b1";
                            } else {
                                seat2 = "b1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c1";
                            } else {
                                seat2 = "c1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "d1";
                            } else {
                                seat2 = "d1";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a2";
                            } else {
                                seat2 = "a2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b2";
                            } else {
                                seat2 = "b2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c2";
                            } else {
                                seat2 = "c2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d2";
                            } else {
                                seat2 = "d2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a3";
                            } else {
                                seat2 = "a3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b3";
                            } else {
                                seat2 = "b3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c3";
                            } else {
                                seat2 = "c3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d3";
                            } else {
                                seat2 = "d3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a4";
                            } else {
                                seat2 = "a4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b4";
                            } else {
                                seat2 = "b4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c4";
                            } else {
                                seat2 = "c4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d4";
                            } else {
                                seat2 = "d4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });


            a5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a5";
                            } else {
                                seat2 = "a5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b5";
                            } else {
                                seat2 = "b5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c5";
                            } else {
                                seat2 = "c5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d5";
                            } else {
                                seat2 = "d5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a6";
                            } else {
                                seat2 = "a6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b6";
                            } else {
                                seat2 = "b6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c6";
                            } else {
                                seat2 = "c6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d6";
                            } else {
                                seat2 = "d6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a7";
                            } else {
                                seat2 = "a7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });


            b7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b7";
                            } else {
                                seat2 = "b7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c7";
                            } else {
                                seat2 = "c7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d7";
                            } else {
                                seat2 = "d7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            a8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a8";
                            } else {
                                seat2 = "a8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            b8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b8";
                            } else {
                                seat2 = "b8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c8";
                            } else {
                                seat2 = "c8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d8";
                            } else {
                                seat2 = "d8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a9";
                            } else {
                                seat2 = "a9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b9";
                            } else {
                                seat2 = "b9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c9";
                            } else {
                                seat2 = "c9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d9";
                            } else {
                                seat2 = "d9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            b.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b.setChecked(false);
                    } else {

                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b";
                            } else {
                                seat2 = "b";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c.setChecked(false);
                    } else {

                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c";
                            } else {
                                seat2 = "c";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }


                    }
                }
            });
        }


        String slot = "";
        switch (time) {
            case "08:00":
                slot = "1";
                break;
            case "10:30":
                slot = "2";
                break;
            case "12:45":
                slot = "3";
                break;
        }
        String url1 = URL_CHECKMAP+route+"&slot="+slot;

        StringRequest request1 = new StringRequest(Request.Method.GET, url1,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String products) {
                        try {
                            int p = 0;
                            JSONArray jsonArray = new JSONArray(products);

                            for (int i = 0; i < jsonArray.length(); i++) {

                                JSONObject hit = jsonArray.getJSONObject(i);

                                frm = hit.getString("point");
                                aat = hit.getString("time");
                                if(p==0){
                                    pt1.setText(frm);
                                    tt1.setText(aat);
                                } else if(p==1){
                                    pt2.setText(frm);
                                    tt2.setText(aat);
                                }else if(p==2){
                                    pt3.setText(frm);
                                    tt3.setText(aat);
                                }else if(p==3){
                                    pt4.setText(frm);
                                    tt4.setText(aat);
                                }else if(p==4){
                                    pt5.setText(frm);
                                    tt5.setText(aat);
                                }else if(p==5){
                                    pt6.setText(frm);
                                    tt6.setText(aat);
                                }else if(p==6){
                                    pt7.setText(frm);
                                    tt7.setText(aat);
                                }else if(p==7){
                                    pt8.setText(frm);
                                    tt8.setText(aat);
                                }else if(p==8){
                                    pt9.setText(frm);
                                    tt9.setText(aat);
                                }else if(p==9){
                                    pt10.setText(frm);
                                    tt10.setText(aat);
                                }
                                p++;
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        mRequestQueue.add(request1);
    }

    public void onCheckboxClicked(View view) {

        switch (view.getId()) {


            case R.id.ma:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);


                break;

            case R.id.mb:

                from = frm;
                at = aat;
                m1.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mc:


                from = frm;
                at = aat;
                m2.setChecked(false);
                m1.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.md:


                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m1.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);
                break;

            case R.id.me:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m1.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);


                break;

            case R.id.mf:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m1.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mg:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m1.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mh:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m1.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mi:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m1.setChecked(false);
                m10.setChecked(false);


                break;

            case R.id.mj:

                from = frm;
                at = aat;
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m1.setChecked(false);
                break;

        }

    }

}