using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;


namespace Travel_agency
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            string query = "SELECT * FROM trips";

            ResultSQL result = new ResultSQL();
            result.name = "elo";
            List<ResultSQL> kurwa = new List<ResultSQL>();
            kurwa.Add(result);
            DataBaseConnect baza = new DataBaseConnect();
            //List_new.DataSource = baza.Select(query);
            foreach (var p in baza.Select(query))
            {
                List_new.Items.Add(p.name).SubItems.Add(p.name.ToString());
                List_new.Items.Add(p.destination).SubItems.Add(p.destination.ToString());
                List_new.Items.Add(p.start).SubItems.Add(p.start.ToString());
                List_new.Items.Add(p.end).SubItems.Add(p.end.ToString());
            }
        }

        private void label3_Click(object sender, EventArgs e)
        {
            
        }


        



    }



    




}


