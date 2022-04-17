package com.example.bus.Connection;


public class History {
    private String busid;
    private String seat;
    private String from;
    private String time;
    private String date;

    public History( String busid, String seat, String from, String time, String date) {

        this.busid = busid;
        this.seat = seat;
        this.from = from;
        this.time = time;
        this.date = date;
    }


    public String getBusid() {
        return busid;
    }

    public String getSeat() {
        return seat;
    }

    public String getFrom() {
        return from;
    }

    public String getTime() {
        return time;
    }

    public String getDate() {
        return date;
    }
}