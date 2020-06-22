using MySql.Data.MySqlClient;
using PdfSharp.Drawing;
using PdfSharp.Pdf;
using System;
using System.Collections.Generic;
using System.Diagnostics;
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

        private void button1_Click(object sender, EventArgs e)
        {
            Logon test = new Logon();
            DataBaseConnect baza = new DataBaseConnect();
            string query = "UPDATE trips SET Buyer = '" + Logon.login + "' WHERE id = '" + List_new.SelectedItems[0].SubItems[4].Text + "'";
            baza.Insert(query);
        }

        private void button2_Click(object sender, EventArgs e)
        {
            DataBaseConnect baza = new DataBaseConnect();
            string query = "SELECT * FROM trips WHERE id = ' " + List_new.SelectedItems[0].SubItems[4].Text +"'";
            

            if (Logon.login.Equals(baza.Select(query)[0].Buyer))
            {
                
            }
            else
            {
                MessageBox.Show("nie można");
                return;
            }

            PdfDocument document = new PdfDocument();
            document.Info.Title = "Bilet";

            PdfPage page = document.AddPage();
            XGraphics gfx = XGraphics.FromPdfPage(page);
            XFont font = new XFont("Verdena", 20, XFontStyle.BoldItalic);

            string client = Logon.login.ToString();

            string text = "Nazwa ->" + List_new.SelectedItems[0].SubItems[0].Text + " ";

            string place = "Miejscowosc ->" + List_new.SelectedItems[0].SubItems[1].Text;

            string date = " Data ->" + List_new.SelectedItems[0].SubItems[2].Text + " " + List_new.SelectedItems[0].SubItems[3].Text;
            gfx.DrawString(client, font, XBrushes.Black, new XRect(0, 0, page.Width, page.Height-50), XStringFormats.Center);
            gfx.DrawString(text, font, XBrushes.Black,new XRect(0, 0, page.Width, page.Height),XStringFormats.Center);
            gfx.DrawString(place, font, XBrushes.Black, new XRect(0, 0, page.Width, page.Height+40), XStringFormats.Center);
            gfx.DrawString(date, font, XBrushes.Black, new XRect(0, 0, page.Width, page.Height + 80), XStringFormats.Center);
            const string filename = "Bliet.pdf";
            document.Save(filename);
            Process.Start(filename);
        }
    }








}


