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
    public partial class Form3 : Form
    {

        private string connectionString = "server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456";

        public Form3()
        {
            InitializeComponent();
            cargarRoles();
            cargarDistritos();

        }

        private void cargarRoles()
        {
            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                SqlDataAdapter da = new SqlDataAdapter("SELECT ci, rol FROM usuario", con);
                DataTable dt = new DataTable();
                da.Fill(dt);
                comboBox1.DataSource = dt;
                comboBox1.DisplayMember = "rol"; // Nombre a mostrar en el ComboBox
                comboBox1.ValueMember = "ci"; // Valor asociado
            }
        }

        private void cargarDistritos()
        {
            using (SqlConnection con = new SqlConnection(connectionString))
            {
                SqlDataAdapter da = new SqlDataAdapter("SELECT id_distrito, nombre FROM distrito", con);
                DataTable dt = new DataTable();
                da.Fill(dt);

                if (dt.Rows.Count > 0)
                {
                    comboBox2.DataSource = dt;
                    comboBox2.DisplayMember = "nombre";
                    comboBox2.ValueMember = "id_distrito";
                }
                else
                {
                    MessageBox.Show("No hay distritos disponibles.");
                    comboBox2.DataSource = null; // Limpiar el ComboBox si no hay distritos
                }
            }
        }

        

        private void cargarZonas(int distritoId)
        {
            using (SqlConnection con = new SqlConnection(connectionString)) // Usa la cadena de conexión definida
            {
                // Cambia la base de datos a 'BDGermayoli' si es donde se encuentra la tabla 'zona'
                SqlDataAdapter da = new SqlDataAdapter("SELECT id_zona, nombre_zona FROM zona WHERE id_distrito = @distritoId", con);
                da.SelectCommand.Parameters.AddWithValue("@distritoId", distritoId);
                DataTable dt = new DataTable();
                da.Fill(dt);

                if (dt.Rows.Count > 0)
                {
                    comboBox3.DataSource = dt;
                    comboBox3.DisplayMember = "nombre_zona"; // Nombre a mostrar en el ComboBox
                    comboBox3.ValueMember = "id_zona"; // Valor asociado
                }
                else
                {
                    MessageBox.Show("No hay zonas disponibles para el distrito seleccionado.");
                    comboBox3.DataSource = null; // Limpiar el ComboBox si no hay zonas
                }
            }
        }




        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string ci = textBox1.Text;
            string nombre = textBox2.Text;
            string paterno = textBox3.Text;
            string materno = textBox4.Text;
            string celular = textBox7.Text;
            string email = textBox5.Text;
            string password = textBox6.Text;
            string rol = comboBox1.SelectedValue.ToString();
            int distritoId = (int)comboBox2.SelectedValue;
            string zonaId = comboBox3.SelectedValue.ToString();

            if (string.IsNullOrEmpty(ci) || string.IsNullOrEmpty(nombre) || string.IsNullOrEmpty(email) || string.IsNullOrEmpty(password))
            {
                MessageBox.Show("Por favor, complete todos los campos obligatorios.");
                return;
            }

            using (SqlConnection con = new SqlConnection("server=localhost\\SQLEXPRESS;database=BDGermayoli;user=usuario;pwd=123456"))
            {
                string query = "INSERT INTO usuario (ci, nombre, paterno, materno, celular, email, password, rol, id_zona) " +
                       "VALUES (@ci, @nombre, @paterno, @materno, @celular, @email, @password, @rol, @zonaId)";

                using (SqlCommand cmd = new SqlCommand(query, con))
                {
                    cmd.Parameters.AddWithValue("@ci", ci);
                    cmd.Parameters.AddWithValue("@nombre", nombre);
                    cmd.Parameters.AddWithValue("@paterno", paterno);
                    cmd.Parameters.AddWithValue("@materno", materno);
                    cmd.Parameters.AddWithValue("@celular", celular); // Agregado
                    cmd.Parameters.AddWithValue("@email", email);
                    cmd.Parameters.AddWithValue("@password", password);
                    cmd.Parameters.AddWithValue("@rol", rol);
                    cmd.Parameters.AddWithValue("@zonaId", zonaId);

                    con.Open();
                    try
                    {
                        cmd.ExecuteNonQuery();
                        MessageBox.Show("Usuario agregado exitosamente");
                        this.Hide(); // Oculta el Form3
                        Form2 form2 = new Form2(); // Crea una nueva instancia de Form2
                        form2.Show();
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show("Error al agregar usuario: " + ex.Message);
                    }
                }
            }
        }

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (comboBox2.SelectedValue != null)
            {
                // Intenta convertir SelectedValue a int
                int distritoId;
                if (int.TryParse(comboBox2.SelectedValue.ToString(), out distritoId))
                {
                    cargarZonas(distritoId);
                }
                
            }
            else
            {
                // Si no hay selección, puedes limpiar el comboBox de zonas
                comboBox3.DataSource = null; // Limpiar zonas si no hay distrito seleccionado
            }
        }

        
    }
}
