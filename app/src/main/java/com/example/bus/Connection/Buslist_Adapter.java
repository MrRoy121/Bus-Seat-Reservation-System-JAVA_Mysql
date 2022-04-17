package com.example.bus.Connection;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.bus.R;

import java.util.List;

public class Buslist_Adapter extends RecyclerView.Adapter<Buslist_Adapter.ProductViewHolder> {

    private Context mCtx;
    private List<Buslist> Buslist;
    private OnItemClickListener mListener;



    public interface OnItemClickListener {
        void onItemClick(int position);
    }
    public void setOnItemClickListener(OnItemClickListener listener) {
        mListener = listener;
    }
    public Buslist_Adapter(Context mCtx, List<Buslist> buslist) {
        this.mCtx = mCtx;
        this.Buslist = buslist;
    }

    @Override
    public ProductViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.bus_list, null);
        return new ProductViewHolder(view);
    }

    @Override
    public int getItemCount() {
        return Buslist.size();
    }
    class ProductViewHolder extends RecyclerView.ViewHolder {

        TextView tdate, tbusid, tseatcount, ttime,  tdriverid, troute, tseatavai;

        public ProductViewHolder(View itemView) {
            super(itemView);

            troute = itemView.findViewById(R.id.route);
            tbusid = itemView.findViewById(R.id.bid);
            tseatcount = itemView.findViewById(R.id.scount);
            tdriverid = itemView.findViewById(R.id.driverid);
            ttime = itemView.findViewById(R.id.time);
            tdate = itemView.findViewById(R.id.date);
            tseatavai = itemView.findViewById(R.id.avais);

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if (mListener != null) {
                        int position = getAdapterPosition();
                        if (position != RecyclerView.NO_POSITION) {
                            mListener.onItemClick(position);
                        }
                    }
                }
            });

        }
    }

    @Override
    public void onBindViewHolder(ProductViewHolder holder, int position) {
        Buslist bus = Buslist.get(position);

        holder.troute.setText(bus.getRoute());
        holder.tdate.setText(bus.getDate());
        holder.tbusid.setText(bus.getBusid());
        holder.tseatcount.setText(bus.getSeatcount());
        holder.tdriverid.setText(bus.getDriverid());
        holder.ttime.setText(bus.getTime());
        holder.tseatavai.setText(bus.getBookedseats());

    }

}

