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
        public bool aktyw = true;
        public Form1()
        {
            InitializeComponent();
            //string query = "SELECT * FROM trips WHERE Name LIKE '" + textBox1.Text + "%'";
            

            
        }

        private void Search_Button_Click(object sender, EventArgs e)
        {
            string query = "SELECT * FROM trips WHERE Name LIKE '" + textBox1.Text + "%' AND Destination LIKE '" + textBox2.Text + "%' AND Date_start LIKE '" + dateTimePicker1.Text + "%' AND Date_end LIKE '" + dateTimePicker2.Text + "%'";
            //MessageBox.Show(dateTimePicker1.Text);
            List_new.Clear();
            ResultSQL result = new ResultSQL();
            result.name = "testy";
            List<ResultSQL> test = new List<ResultSQL>();
            test.Add(result);
            DataBaseConnect baza = new DataBaseConnect();
            //List_new.DataSource = baza.Select(query);
            List_new.Columns.Add("Nazwa");

            List_new.Columns.Add("Miejscowość");
            List_new.Columns.Add("Data rozpoczęcia");
            List_new.Columns.Add("Data zakończenia");
            List_new.Columns.Add("id");
            List_new.AutoResizeColumns(ColumnHeaderAutoResizeStyle.HeaderSize);
            //List_new.DataSource = baza.Select(query);
            foreach (var p in baza.Select(query))
            {
                ListViewItem listView = new ListViewItem(p.name.ToString());
                listView.SubItems.Add(p.destination.ToString());
                listView.SubItems.Add(p.start.ToString().Substring(0, 10));
                listView.SubItems.Add(p.end.ToString().Substring(0, 10));
                listView.SubItems.Add(p.id.ToString());
                List_new.Items.Add(listView);

            }
        }
    }



    




}


