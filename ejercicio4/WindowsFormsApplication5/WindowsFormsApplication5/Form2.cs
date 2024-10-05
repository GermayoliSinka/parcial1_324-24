using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace WindowsFormsApplication5
{
    public partial class Form2 : Form
    {
        DataSet ds = new DataSet();

        private void datos()
        {
            SqlConnection con = new SqlConnection();            
            con.ConnectionString = "server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456";

            ds.Clear();

            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand = new SqlCommand("SELECT * FROM usuario", con);
            ada.Fill(ds, "usuario");
            ada.SelectCommand = new SqlCommand("SELECT * FROM propiedad", con);
            ada.Fill(ds, "propiedad");
            ada.SelectCommand = new SqlCommand("SELECT * FROM zona", con);
            ada.Fill(ds, "zona");
            
        }

        public Form2()
        {
            InitializeComponent();
            dataGridView1.CellEndEdit += new DataGridViewCellEventHandler(dataGridView1_CellEndEdit);
        }

        private void button1_Click(object sender, EventArgs e)
        {
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "usuario";
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            datos();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "propiedad";
        }

        private void dataGridView1_CellEndEdit(object sender, DataGridViewCellEventArgs e)
        {
            if (dataGridView1.DataMember == "usuario")
            {
                string ci = dataGridView1.Rows[e.RowIndex].Cells["ci"].Value.ToString();
                string nombre = dataGridView1.Rows[e.RowIndex].Cells["nombre"].Value.ToString();
                string paterno = dataGridView1.Rows[e.RowIndex].Cells["paterno"].Value.ToString();
                string materno = dataGridView1.Rows[e.RowIndex].Cells["materno"].Value.ToString();
                string celular = dataGridView1.Rows[e.RowIndex].Cells["celular"].Value.ToString();
                string email = dataGridView1.Rows[e.RowIndex].Cells["email"].Value.ToString();
                string password = dataGridView1.Rows[e.RowIndex].Cells["password"].Value.ToString();
                string rol = dataGridView1.Rows[e.RowIndex].Cells["rol"].Value.ToString();
                string id_zona = dataGridView1.Rows[e.RowIndex].Cells["id_zona"].Value.ToString();
                actualizarUsuario(ci, nombre, paterno, materno, celular, email, password, rol, id_zona);
            }
            else if (dataGridView1.DataMember == "propiedad")
            {
                int cod_catastro = Convert.ToInt32(dataGridView1.Rows[e.RowIndex].Cells["cod_catastro"].Value);
                string id_zona = dataGridView1.Rows[e.RowIndex].Cells["id_zona"].Value.ToString();
                decimal x_inicial = Convert.ToDecimal(dataGridView1.Rows[e.RowIndex].Cells["x_inicial"].Value);
                decimal y_inicial = Convert.ToDecimal(dataGridView1.Rows[e.RowIndex].Cells["y_inicial"].Value);
                decimal x_final = Convert.ToDecimal(dataGridView1.Rows[e.RowIndex].Cells["x_final"].Value);
                decimal y_final = Convert.ToDecimal(dataGridView1.Rows[e.RowIndex].Cells["y_final"].Value);
                decimal superficie = Convert.ToDecimal(dataGridView1.Rows[e.RowIndex].Cells["superficie"].Value);
                string ci_propietario = dataGridView1.Rows[e.RowIndex].Cells["ci_propietario"].Value.ToString();
                actualizarPropiedad(cod_catastro, id_zona, x_inicial, y_inicial, x_final, y_final, superficie, ci_propietario);
            }
        }

        private void actualizarUsuario(string ci, string nombre, string paterno, string materno, string celular, string email, string password, string rol, string id_zona)
        {
            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                SqlCommand cmd = new SqlCommand("UPDATE usuario SET nombre=@nombre, paterno=@paterno, materno=@materno, celular=@celular, email=@email, password=@password, rol=@rol, id_zona=@id_zona WHERE ci=@ci", con);
                cmd.Parameters.AddWithValue("@nombre", nombre);
                cmd.Parameters.AddWithValue("@paterno", paterno);
                cmd.Parameters.AddWithValue("@materno", materno);
                cmd.Parameters.AddWithValue("@celular", celular);
                cmd.Parameters.AddWithValue("@email", email);
                cmd.Parameters.AddWithValue("@password", password);
                cmd.Parameters.AddWithValue("@rol", rol);
                cmd.Parameters.AddWithValue("@id_zona", id_zona);
                cmd.Parameters.AddWithValue("@ci", ci);
                con.Open();
                cmd.ExecuteNonQuery();
            }

            datos(); 
        }

        private void actualizarPropiedad(int cod_catastro, string id_zona, decimal x_inicial, decimal y_inicial, decimal x_final, decimal y_final, decimal superficie, string ci_propietario)
        {
            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                SqlCommand cmd = new SqlCommand("UPDATE propiedad SET id_zona=@id_zona, x_inicial=@x_inicial, y_inicial=@y_inicial, x_final=@x_final, y_final=@y_final, superficie=@superficie, ci_propietario=@ci_propietario WHERE cod_catastro=@cod_catastro", con);
                cmd.Parameters.AddWithValue("@id_zona", id_zona);
                cmd.Parameters.AddWithValue("@x_inicial", x_inicial);
                cmd.Parameters.AddWithValue("@y_inicial", y_inicial);
                cmd.Parameters.AddWithValue("@x_final", x_final);
                cmd.Parameters.AddWithValue("@y_final", y_final);
                cmd.Parameters.AddWithValue("@superficie", superficie);
                cmd.Parameters.AddWithValue("@ci_propietario", ci_propietario);
                cmd.Parameters.AddWithValue("@cod_catastro", cod_catastro);
                con.Open();
                cmd.ExecuteNonQuery();
            }

            datos(); 
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Form3 f3 = new Form3(); 
            f3.ShowDialog();
            datos(); 
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "usuario";
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Form4 f4 = new Form4();
            f4.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "propiedad";
        }

        private void button5_Click(object sender, EventArgs e)
        {
            if (dataGridView1.DataMember == "usuario")
            {
                string ci = textBox1.Text; // Obtener el CI del TextBox
                eliminarUsuario(ci);
            }
            else if (dataGridView1.DataMember == "propiedad")
            {
                int cod_catastro = Convert.ToInt32(textBox1.Text); // Obtener el código del TextBox
                eliminarPropiedad(cod_catastro);
            }

            datos(); 
        }

        private void eliminarUsuario(string ci)
        {
            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                SqlCommand cmd = new SqlCommand("DELETE FROM usuario WHERE ci=@ci", con);
                cmd.Parameters.AddWithValue("@ci", ci);
                con.Open();
                cmd.ExecuteNonQuery();
            }
        }

        private void eliminarPropiedad(int cod_catastro)
        {
            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                SqlCommand cmd = new SqlCommand("DELETE FROM propiedad WHERE cod_catastro=@cod_catastro", con);
                cmd.Parameters.AddWithValue("@cod_catastro", cod_catastro);
                con.Open();
                cmd.ExecuteNonQuery();
            }
        }
    }
}
