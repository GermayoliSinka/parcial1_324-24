USE [master]
GO
/****** Object:  Database [BDGermayoli]    Script Date: 05/10/2024 06:00:01 a. m. ******/
CREATE DATABASE [BDGermayoli]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'BDGermayoli', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\BDGermayoli.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'BDGermayoli_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\BDGermayoli_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [BDGermayoli] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [BDGermayoli].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [BDGermayoli] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [BDGermayoli] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [BDGermayoli] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [BDGermayoli] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [BDGermayoli] SET ARITHABORT OFF 
GO
ALTER DATABASE [BDGermayoli] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [BDGermayoli] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [BDGermayoli] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [BDGermayoli] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [BDGermayoli] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [BDGermayoli] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [BDGermayoli] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [BDGermayoli] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [BDGermayoli] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [BDGermayoli] SET  DISABLE_BROKER 
GO
ALTER DATABASE [BDGermayoli] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [BDGermayoli] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [BDGermayoli] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [BDGermayoli] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [BDGermayoli] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [BDGermayoli] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [BDGermayoli] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [BDGermayoli] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [BDGermayoli] SET  MULTI_USER 
GO
ALTER DATABASE [BDGermayoli] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [BDGermayoli] SET DB_CHAINING OFF 
GO
ALTER DATABASE [BDGermayoli] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [BDGermayoli] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [BDGermayoli] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [BDGermayoli] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [BDGermayoli] SET QUERY_STORE = ON
GO
ALTER DATABASE [BDGermayoli] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [BDGermayoli]
GO
/****** Object:  Table [dbo].[distrito]    Script Date: 05/10/2024 06:00:02 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[distrito](
	[id_distrito] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](100) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_distrito] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[propiedad]    Script Date: 05/10/2024 06:00:02 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[propiedad](
	[cod_catastro] [int] NOT NULL,
	[id_zona] [varchar](10) NULL,
	[x_inicial] [decimal](10, 6) NOT NULL,
	[y_inicial] [decimal](10, 6) NOT NULL,
	[x_final] [decimal](10, 6) NOT NULL,
	[y_final] [decimal](10, 6) NOT NULL,
	[superficie] [decimal](10, 3) NOT NULL,
	[ci_propietario] [varchar](15) NULL,
PRIMARY KEY CLUSTERED 
(
	[cod_catastro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 05/10/2024 06:00:02 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[ci] [varchar](15) NOT NULL,
	[nombre] [varchar](50) NOT NULL,
	[paterno] [varchar](50) NOT NULL,
	[materno] [varchar](50) NULL,
	[celular] [varchar](15) NULL,
	[email] [varchar](100) NOT NULL,
	[password] [varchar](255) NOT NULL,
	[rol] [varchar](15) NOT NULL,
	[id_zona] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[ci] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[zona]    Script Date: 05/10/2024 06:00:02 a. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[zona](
	[id_zona] [varchar](10) NOT NULL,
	[nombre_zona] [varchar](100) NOT NULL,
	[id_distrito] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id_zona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[distrito] ON 
GO
INSERT [dbo].[distrito] ([id_distrito], [nombre]) VALUES (1, N'La Paz')
GO
INSERT [dbo].[distrito] ([id_distrito], [nombre]) VALUES (2, N'El Alto')
GO
INSERT [dbo].[distrito] ([id_distrito], [nombre]) VALUES (3, N'Viacha')
GO
INSERT [dbo].[distrito] ([id_distrito], [nombre]) VALUES (4, N'Laja')
GO
INSERT [dbo].[distrito] ([id_distrito], [nombre]) VALUES (5, N'Palca')
GO
SET IDENTITY_INSERT [dbo].[distrito] OFF
GO
INSERT [dbo].[propiedad] ([cod_catastro], [id_zona], [x_inicial], [y_inicial], [x_final], [y_final], [superficie], [ci_propietario]) VALUES (1, N'Z001', CAST(-16.500000 AS Decimal(10, 6)), CAST(-68.119000 AS Decimal(10, 6)), CAST(-16.505000 AS Decimal(10, 6)), CAST(-68.115000 AS Decimal(10, 6)), CAST(150.500 AS Decimal(10, 3)), N'12345678')
GO
INSERT [dbo].[propiedad] ([cod_catastro], [id_zona], [x_inicial], [y_inicial], [x_final], [y_final], [superficie], [ci_propietario]) VALUES (2, N'Z002', CAST(-16.520000 AS Decimal(10, 6)), CAST(-68.121000 AS Decimal(10, 6)), CAST(-16.522000 AS Decimal(10, 6)), CAST(-68.119000 AS Decimal(10, 6)), CAST(200.000 AS Decimal(10, 3)), N'87654321')
GO
INSERT [dbo].[usuario] ([ci], [nombre], [paterno], [materno], [celular], [email], [password], [rol], [id_zona]) VALUES (N'12345678', N'Juan', N'Pérez', N'González', N'72412345', N'juan.perez@gmail.com', N'usuario1', N'Funcionario', N'Z001')
GO
INSERT [dbo].[usuario] ([ci], [nombre], [paterno], [materno], [celular], [email], [password], [rol], [id_zona]) VALUES (N'456', N'dd', N'eed', N'dddddddd', N'12325', N'sd@e', N'sss', N'12345678', N'Z002')
GO
INSERT [dbo].[usuario] ([ci], [nombre], [paterno], [materno], [celular], [email], [password], [rol], [id_zona]) VALUES (N'45612378', N'Carlos', N'Rivas', N'Jiménez', N'72445678', N'carlos.rivas@gmail.com', N'funcionario1', N'Funcionario', N'Z003')
GO
INSERT [dbo].[usuario] ([ci], [nombre], [paterno], [materno], [celular], [email], [password], [rol], [id_zona]) VALUES (N'87654321', N'Anita', N'Torres', N'Fernández', N'72498765', N'ana.torres@gmail.com', N'usuario2', N'Usuario', N'Z002')
GO
INSERT [dbo].[zona] ([id_zona], [nombre_zona], [id_distrito]) VALUES (N'Z001', N'Zona Sur', 1)
GO
INSERT [dbo].[zona] ([id_zona], [nombre_zona], [id_distrito]) VALUES (N'Z002', N'Miraflores', 1)
GO
INSERT [dbo].[zona] ([id_zona], [nombre_zona], [id_distrito]) VALUES (N'Z003', N'San Miguel', 1)
GO
INSERT [dbo].[zona] ([id_zona], [nombre_zona], [id_distrito]) VALUES (N'Z004', N'Villa Fátima', 1)
GO
INSERT [dbo].[zona] ([id_zona], [nombre_zona], [id_distrito]) VALUES (N'Z005', N'El Alto Centro', 2)
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [UQ__usuario__AB6E6164EBB1498E]    Script Date: 05/10/2024 06:00:02 a. m. ******/
ALTER TABLE [dbo].[usuario] ADD UNIQUE NONCLUSTERED 
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[propiedad]  WITH CHECK ADD FOREIGN KEY([ci_propietario])
REFERENCES [dbo].[usuario] ([ci])
GO
ALTER TABLE [dbo].[propiedad]  WITH CHECK ADD FOREIGN KEY([id_zona])
REFERENCES [dbo].[zona] ([id_zona])
GO
ALTER TABLE [dbo].[usuario]  WITH CHECK ADD FOREIGN KEY([id_zona])
REFERENCES [dbo].[zona] ([id_zona])
GO
ALTER TABLE [dbo].[zona]  WITH CHECK ADD FOREIGN KEY([id_distrito])
REFERENCES [dbo].[distrito] ([id_distrito])
GO
ALTER TABLE [dbo].[propiedad]  WITH CHECK ADD CHECK  (([cod_catastro]=(3) OR [cod_catastro]=(2) OR [cod_catastro]=(1)))
GO
USE [master]
GO
ALTER DATABASE [BDGermayoli] SET  READ_WRITE 
GO
