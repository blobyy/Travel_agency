using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;

namespace Travel_agency
{
    class DataBaseConnect
    {
        private MySqlConnection connection;
        private string server;
        private string database;
        private string uid;
        private string password;


        public DataBaseConnect()
        {
            Initialize();
        }


        private void Initialize()
        {
            server = "localhost";
            database = "travel_data";
            uid = "test";
            password = "1234";
            string connectionString;
            connectionString = "SERVER=" + server + ";" + "DATABASE=" + database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";";

            connection = new MySqlConnection(connectionString);

        }



        private bool OpenConnection()
        {
            try
            {
                connection.Open();
                return true;
            }
            catch(MySqlException ex)
            {

                switch(ex.Number)
                {
                    case 0:
                        System.Windows.Forms.MessageBox.Show("Cannot connect to server.  Contact administrator");
                        break;

                    case 1045:
                        System.Windows.Forms.MessageBox.Show("Invalid username/password, please try again");
                        break;
                }

                return false;
            }
        }

        private bool CloseConnection()
        {
            try
            {
                connection.Close();
                return true;
            }
            catch (MySqlException ex)
            {
                System.Windows.Forms.MessageBox.Show(ex.Message);
                return false;
            }
        }

        public void Insert(string query )
        {

            if(this.OpenConnection() == true)
            {
                MySqlCommand cmd = new MySqlCommand(query, connection);

                cmd.ExecuteNonQuery();

                this.CloseConnection();
            }
        }




        public List<ResultSQL> Select(string query)
        {
            

            //Create a list to store the result
            List<string> list = new List<string>();
            List<ResultSQL> result = new List<ResultSQL>();
            
            //Open connection
            if (this.OpenConnection() == true)
            {
                //Create Command
                MySqlCommand cmd = new MySqlCommand(query, connection);
                //Create a data reader and Execute the command
                MySqlDataReader dataReader = cmd.ExecuteReader();

                //Read the data and store them in the list
                while (dataReader.Read())
                {
                    list.Add(dataReader["Name"] + "");
                    list.Add(dataReader["Destination"] + "");
                    list.Add(dataReader["Date_start"] + "");
                    list.Add(dataReader["Date_end"] + "");
                    list.Add(dataReader["id"] + "");
                    result.Add(new ResultSQL(list));
                    list.Clear();
                }

                //close Data Reader
                dataReader.Close();

                //close Connection
                this.CloseConnection();
               
                //return list to be displayed
                return result;
            }
            else
            {
                return result;
            }
        }





    }


   
    public class ResultSQL
    {

    public string name { get; set; }
    public string destination { get; set; }
    public string start { get; set; }
    public string end { get; set; }
    public string id { get; set; }


        public ResultSQL()
        {

        }

    public ResultSQL(List<String> lista)
    {
            this.name = lista[0];
            this.destination = lista[1];
            this.start = lista[2];
            this.end = lista[3];
            this.id = lista[4];
    }
}
}



