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
            database = "";
            uid = "";
            password = "";
        }
























    }
}
